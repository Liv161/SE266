<?php

/* 
 * addproject()
 * update/edit()
 * delete()
 * 
 * 
 * 
 * 
 * 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getDatabase(){
    $config = array(
        'DB_DNS' => 'mysql:host=ict.neit.edu;port=5500;dbname=se266_000926501;',
        'DB_USER' => 'se266_000926501',
        'DB_PASSWORD'=> '000926501'
    );
    
    $db = new PDO($config['DB_DNS'], $config['DB_USER'],$config['DB_PASSWORD']);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    return $db;
}

function isPostRequest(){
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST');
}

function isGetRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET' );
}
//add project function
function addProject ( $projectName, $projectManager) {
    
    global $db;       
    $stmt = $db->prepare("INSERT INTO projects SET projectName = :projectName, projectManager = :projectManager, dateCreated = now()");
    
    $result = "Something is wrong";
    $binds = array(
        ":projectName" => $projectName,
        ":projectManager" => $projectManager,
       
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0){
        $result = 'Project Added';
    }
    
    return ($result);
    
}
//edit or update project function
function editProject ( $projectName, $projectManager) {
    
    global $db;       
    $stmt = $db->prepare("UPDATE projects SET projectName = :projectName, projectManager = :projectManager WHERE id = :id");
    
    $result = "Something is wrong";
    $binds = array(
        ":projectName" => $projectName,
        ":projectManager" => $projectManager,
       
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0){
        $result = 'Project Updated';
    }
    else 
    {
        // Update.php?id=1
        $id = filter_input(INPUT_GET, 'id');
        $stmt = $db->prepare("SELECT * FROM projects WHERE id = :id");
        $binds = array(":id" => $id);  
    }
            
    return ($result);
    
}
//delete project function
function deleteProject ($id) {
    
    global $db;       
    $stmt = $db->prepare("DELETE FROM projects WHERE id = :id");
    
    $result = "Something is wrong";
    $binds = array(
        ":id" => $id,
       
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0){
        $result = 'Project Added';
    }
    
    return ($result);
    
}


