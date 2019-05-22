<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Project Entry</title>
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
       <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Project Center</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="addproject.php">New Project</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="viewproject.php">Project Management</a>
      </li>
    </ul>
  </div>
</nav>
<?php
    
    require './functions/dbData.php';
    
    $result = '';
     if (isPostRequest()){
             $db = getDatabase();
             $projectName = filter_input(INPUT_POST, 'projectName');
             $projectManager = filter_input(INPUT_POST, 'projectManager');
             
            $result = addProject ($projectName, $projectManager);            
         
        }       
        
?>

        <form style="text-align: center; margin-top: 4%" method ="post" action="#">
            <h1 style=" text-decoration: underline">New Project Entry</h1>
            <label style="margin-top: 1%">Project Name</label>
            <br> 
            <input type="text" value="" name="projectName"/>
            <br>
            <label style="margin-top: 1%">Project Manager</label>
            <br>
            <input type="text" value="" name="projectManager" />
            <br>
            <input style="margin-top: 1%" type="submit" value="Submit"/>
        </form>
        <h1><?php echo $result; ?></h1>

    </body>
</html>