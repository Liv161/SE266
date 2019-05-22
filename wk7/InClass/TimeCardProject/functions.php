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

function addProject ( $projectName) {
    
    global $db;       
    $stmt = $db->prepare("INSERT INTO projects (projectName) VALUES (:projectName)");
    
    $result = "Something is wrong";
    $binds = array(
        ":projectName" => $projectName,
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0){
        $result = 'Project Added';
    }
    
    return ($result);
    
}

?>