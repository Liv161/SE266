<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">         
        <title>File Upload</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <body>

<?php       
    session_start();
   include_once './functions/header.php';
   include_once './functions/dbData.php';
   
    if(!isLoggedIn())
    {
         header ('Location: login.php');
         die();//Kills the session
    }
    
    if (isset($_FILES['file1'])) 
    {
        $tmp_name = $_FILES['file1']['tmp_name'];
        $path = getcwd() .DIRECTORY_SEPARATOR . 'uploads';
        $new_name = $path . DIRECTORY_SEPARATOR . $_FILES['file1']['name'];

        move_uploaded_file($tmp_name, $new_name);     
        
        $dataFolder = "./uploads";
        
        $file = fopen ($path.'/schools.csv', 'rb');
        
        //var_dump($file);
        $school_col = 0;
        $city_col = 1;
        $state_col = 2;
        
        $db = dbconnect();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = 'TRUNCATE school';
        $stmt = $db->prepare($sql);
        $stmt->execute();
        
        fgetcsv($file);
        
        while(!feof($file)){
            $school = fgetcsv($file);
            $db = dbconnect();
            $sql = 'INSERT INTO school (school_name, city, state) VALUES (:school, :city, :state)';
            $params = array(
                ':school' => $school[$school_col],
                ':city' => $school[$city_col],
                ':state' => $school[$state_col],                
            );
            $stmt = $db-> prepare($sql);
            try{
                $results = $stmt->execute($params);
            } catch (Exception $ex) {
                var_dump($ex->message);die();
            }
        }
        
        fclose($file);//file closed
        
        $submit = filter_input(INPUT_POST, 'submit');
        if(isset($submit)){
            header('Location: search.php');
        }       
    }   
?>


<form style="margin-top: 10%; padding: 2%; border: 2px solid black; background: lightgray" action="fileUpload.php" method="post" enctype="multipart/form-data">
    <h1 style="margin-top: 1%">File Upload</h1>
    <input type="file" name="file1">
<input type="submit" name="submit" value="Upload">

</form>