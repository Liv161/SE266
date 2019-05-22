<?php

include_once __DIR__ . '/dbconnect.php';

function getAllTestData(){
    $db = dbconnect();
           
    $stmt = $db->prepare("SELECT * FROM corps");

     $results = array();
     if ($stmt->execute() && $stmt->rowCount() > 0) {
         $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
     }
    return $results;
}


function getSearchData($column, $searchWord){
    $db = dbconnect();
           
    $stmt = $db->prepare("SELECT * FROM corps WHERE $column LIKE :search");
    $search = '%'.$searchWord.'%';
            $binds = array(
                ":search" => $search
            );
     $results = array();
     if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
         $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
     }
    return $results;
}

function getColumns () {
    $columns = ["email", "phone", "zipcode", "owner"];
    
    return ($columns);
}


function getSortedData() {
    
}


function searchTest($column, $search){
    
}
