<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Project View</title>
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

        $stmt = $db->prepare("SELECT * FROM projects");

        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        
        ?>
        <div class="container">
        <div class="h1" style="text-align: center; margin-top: 4%; text-decoration: underline">Project View</div>
            <?php 
            
        
            $action = filter_input(INPUT_GET, 'action');
           
           if ( $action === 'sort' )
           {
               $column = filter_input(INPUT_GET, 'colum');
               $order = filter_input(INPUT_GET, 'order');
               
               $count = rowCount1($column, $order);
               
               if($count > 0){
                echo "ROW COUNT: {$count}";
              }
              else
              {
                  echo "NO RESULTS FOUND!!";
              }
               $results = getSort($column, $order);
                           
           }
           
           else if ( $action === 'search' )
           {
               $colum = filter_input(INPUT_GET, 'colum');
               $keyword = filter_input(INPUT_GET, 'keyword');
               
              $count = rowCount2($colum, $keyword);
              
              if($count > 0){
                echo "ROW COUNT: {$count}";
              }
              else
              {
                  echo "NO RESULTS FOUND!!";
              }
               $results = getSearch($colum, $keyword);
           }
           
        
            include './includes/searchForm.php';
            include './includes/sortForm.php';
            ?>
        
            <table style="text-align: center" class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>PROJECTS</th>
                        <th>PROJECT MANAGERS</th>
                        <th>Project Created</th>
                        <th></th>
                        <th>ACTION</th>
                        <th></th>
                    </tr>
                </thead>
                
                <?php foreach ($results as $row): ?>
                <tr>

                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['projectName']; ?></td>
                    <td><?php echo $row['projectManager']; ?></td>
                    <td><?php echo date("m/d/y "." h:m:sa",strtotime($row['projectCreated'])); ?></td> 
                           
                    
                   
                    <td><a href="Read.php?id=<?php echo $row['id']; ?>"<span class="badge badge-success"></span>Read</a><br>
                        <a href="check_in.php?id=<?php echo $row['id']; ?>"<span class="badge badge-primary"></span>Check In</a></td>                      
                    <td><a href="Update.php?id=<?php echo $row['id']; ?>"<span class="badge badge-warning"></span>Update</a></td> 
                    <td><a href="Delete.php?id=<?php echo $row['id']; ?>"<span class="badge badge-danger"></span>Delete</a><br>
                        <a href="check_out.php?id=<?php echo $row['id']; ?>"<span class="badge badge-primary"></span>Check Out</a></td>  
                    
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>
