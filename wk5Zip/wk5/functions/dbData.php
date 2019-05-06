<?php

include_once "dbConnect.php";

function login($userName, $passWord){
    $db = dbconnect();
    // prepare the SQL statement
    $stmt = $db->prepare("SELECT username, password FROM user WHERE username = '".$userName."' AND password = '".$passWord."'");
    $results = array();
    if ($stmt->execute() && $stmt->rowCount() > 0) 
        {
        // fetches all rows for the conditions of SQL statement as an Associative Array
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        else
        {
            $results = "";
        }
    return $results;
}

 function isLoggedIn() {
    
    if ( !isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === false 
            ) {
            return false;
        }
        return true;
}

function hash_password($password)
{
    $salt = 'random string for better hashing';
    $hash = sha1($salt . $password);
    return $hash;
}

function allSchools(){
    // establish a database connection
    $db = dbconnect();
    
    // prepare the SQL statement
    $stmt = $db->prepare("SELECT * FROM school");

    $results = array();
    // execute the statement (Returns BOOL), 
    //     if TRUE check the row count
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        // fetches all rows for the conditions of SQL statement as an Associative Array
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
     
    return $results;
}

function searchSchools($schoolCol_Keyword, $cityCol_Keyword, $stateCol_Keyword)
{
    $school_col = 'school_name';
    $city_col = 'city';
    $state_col = 'state';
    
    // establish a database connection
    $db = dbconnect();
    
     // prepare the SQL statement
    $stmt = $db->prepare("SELECT * FROM school WHERE $school_col LIKE '%$schoolCol_Keyword%' AND $city_col LIKE '%$cityCol_Keyword%' AND $state_col LIKE '%$stateCol_Keyword%'");
    
    $results = array();
    // execute the statement (Returns BOOL), 
    //     if TRUE check the row count
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        // fetches all rows for the conditions of SQL statement as an Associative Array
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
    return $results;
}

function schoolCount1($schoolCol_Keyword, $cityCol_Keyword, $stateCol_Keyword)//
{
    $school_col = 'school_name';
    $city_col = 'city';
    $state_col = 'state';
    
    // establish a database connection
    $db = dbconnect();
    
     // prepare the SQL statement
    $stmt = $db->prepare("SELECT * FROM school WHERE $school_col LIKE '%$schoolCol_Keyword%' AND $city_col LIKE '%$cityCol_Keyword%' AND $state_col LIKE '%$stateCol_Keyword%'");
    
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

function allSchoolCount()//retrieves how many schools are in the table
{
     // establish a database connection
    $db = dbconnect();
    
    // prepare the SQL statement
    $stmt = $db->prepare("SELECT * FROM school");

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