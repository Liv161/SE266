<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Check In</title>
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
          include './functions/dbData.php';
           
            
            $db = getDatabase();
            
            $result = '';
            $projectName = '';
            $projectManager = '';
            $projectCheckIn = '';
            $projectCheckOut = '';
            $projectCreated = '';
            
//            var_dump($_SERVER);die();
            
            if (isPostRequest()) {
                $id = filter_input(INPUT_POST, 'id');               
                $projectName = filter_input(INPUT_POST, 'projectName');
                $projectManager = filter_input(INPUT_POST, 'projectManager');
                $projectCheckIn = filter_input(INPUT_POST, 'projectCheckIn');
                $projectCheckOut = filter_input(INPUT_POST, 'projectCheckOut');
                $projectCreated = filter_input(INPUT_POST, 'projectCreated');
                
                $stmt = $db->prepare("UPDATE projects SET projectCheckIn = now() WHERE id = :id");
                
                $binds = array(
                    ":id" => $id
//                    ":projectName" => $projectName,
//                    ":projectManager" => $projectManager
//                    ":projectCheckIn" => $projectCheckIn,
//                    ":projectCheckOut" => $projectCheckOut,
//                    ":projectDuration" => $projectDuration
                );                
                if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                   $result = 'Project: '.$projectName.' Has Checked In';
                } 
            } 
            else {
                // Update.php?id=1
                $id = filter_input(INPUT_GET, 'id');
                $stmt = $db->prepare("SELECT * FROM projects WHERE id = :id");
                $binds = array(
                    ":id" => $id
                );
                if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                    //if ($stmt->rowCount() > 0) {
                    $results = $stmt->fetch(PDO::FETCH_ASSOC);
                    $projectName = $results['projectName'];
                    $projectManager = $results['projectManager'];
                    $projectCheckIn = $results['projectCheckIn'];
                    $projectCheckOut = $results['projectCheckOut'];
                    $projectCreated = $results['projectCreated'];
                    //} else {
                    
                    //}
                } 
                
                else {
                  echo 'Record not found';  
                }
                // Indicates update 
                if ( !isset($id) ) {
                    echo 'Record not found';
                }
            }
        
        
        ?>
<!--        <div> <h1 style="text-align: center; margin-top: 4%; text-decoration: underline">Check In </h1></div>-->
        <h1><?php echo $result; ?></h1>
        
        <form style="margin-left: 5%" method="post" action="#"> 
            <h1 style=" text-decoration: underline; margin-left: 1%">Project Check In</h1>
            <label style="margin-left: 100px">ID </label> 
            <input type="text" value="<?php echo $id; ?>" name="id" readonly="readonly"/>
            <br />
            <label style="margin-left: 20px">Project Name</label>
            <input type="text" value="<?php echo $projectName; ?>" name="projectName" />
            <br />
            <label >Project Manager</label> 
            <input type="text" value="<?php echo $projectManager; ?>" name="projectManager" />
            <br />
           
            <input type="hidden" value="<?php echo $id; ?>" name="id" /> 
            <input style="margin-left: 120px" type="submit" value="Confirm" />
        </form>
    </body>
</html>
