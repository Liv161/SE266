<?php

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
    $stmt = $db->prepare("INSERT INTO projects SET projectName = :projectName, projectManager = :projectManager, projectCheckIn = now(), projectCheckOut = now(), projectCreated = now()");
    
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

function getSort($column, $order)
{
    // establish a database connection
     global $db; 
    
    // prepare the SQL statement
    $stmt = $db->prepare("SELECT * FROM projects ORDER BY $column $order");
    
     $results = array();
    // execute the statement (Returns BOOL), 
    //     if TRUE check the row count
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        // fetches all rows for the conditions of SQL statement as an Associative Array
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return $results;
}

function getSearch ($colum, $keyword)
{
 // establish a database connection
     global $db; 
    
     // prepare the SQL statement
    $stmt = $db->prepare("SELECT * FROM projects WHERE ($colum LIKE '%$keyword%')");
    
    $results = array();
    // execute the statement (Returns BOOL), 
    //     if TRUE check the row count
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        // fetches all rows for the conditions of SQL statement as an Associative Array
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
    return $results;
}
/////////////////////////////////////////////////////////////////////////////////////////////
//*****************************************************************************************//
/////////////////////////////////////////////////////////////////////////////////////////////
function rowCount1($value1, $value2)
{
    // establish a database connection
     global $db; 
    
     // prepare the SQL statement
    $stmt = $db->prepare("SELECT * FROM projects ORDER BY $value1 $value2");
    
    
     $results = array();
    // execute the statement (Returns BOOL), 
    //     if TRUE check the row count
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        // fetches all rows for the conditions of SQL statement as an Associative Array
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $rowCount = $stmt->rowCount();
        }
        
    return $rowCount;
}

function rowCount2($value1, $value2)
{
    // establish a database connection
     global $db; 
    
     // prepare the SQL statement
    $stmt = $db->prepare("SELECT * FROM projects WHERE ($value1 LIKE '%$value2%')");    
     $results = array();
    // execute the statement (Returns BOOL), 
    //     if TRUE check the row count
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        // fetches all rows for the conditions of SQL statement as an Associative Array
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $rowCount = $stmt->rowCount();
        }
      if ($rowCount > 0) { 
    return $rowCount;
      }
      else
      {
          $rowCount = 0;
          
          return $rowCount;
      }
}

