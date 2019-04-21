<?php

include_once "dbConnect.php";

function getAllCorpData(){
    // establish a database connection
    $db = dbconnect();
    
    // prepare the SQL statement
    $stmt = $db->prepare("SELECT * FROM corps");

    $results = array();
    // execute the statement (Returns BOOL), 
    //     if TRUE check the row count
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        // fetches all rows for the conditions of SQL statement as an Associative Array
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
     
    return $results;
}

function getCorpSort($column, $order)
{
    // establish a database connection
    $db = dbconnect();
    
    // prepare the SQL statement
    $stmt = $db->prepare("SELECT * FROM corps ORDER BY $column $order");
    
     $results = array();
    // execute the statement (Returns BOOL), 
    //     if TRUE check the row count
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        // fetches all rows for the conditions of SQL statement as an Associative Array
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return $results;
}

function getCorpSearch ($colum, $keyword)
{
 // establish a database connection
    $db = dbconnect();
    
     // prepare the SQL statement
    $stmt = $db->prepare("SELECT * FROM corps WHERE ($colum LIKE '%$keyword%')");
    
    $results = array();
    // execute the statement (Returns BOOL), 
    //     if TRUE check the row count
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        // fetches all rows for the conditions of SQL statement as an Associative Array
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
    return $results;
}

function rowCount1($value1, $value2)
{
    // establish a database connection
    $db = dbconnect();
    
     // prepare the SQL statement
    $stmt = $db->prepare("SELECT * FROM corps ORDER BY $value1 $value2");
    
    
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
    $db = dbconnect();
    
     // prepare the SQL statement
    $stmt = $db->prepare("SELECT * FROM corps WHERE ($value1 LIKE '%$value2%')");    
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
