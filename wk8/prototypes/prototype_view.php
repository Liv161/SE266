<!--<!DOCTYPE html>

To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.

<html>
    <head>
        <meta charset="UTF-8">
        <title>Project View</title>
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
       <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('txt').innerHTML =
  h + ":" + m + ":" + s;
  var t = setTimeout(startTime, 500);
}
function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}
</script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="prototype_main.php">Project Management</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="addproject.php">New Project</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="prototype_view.php">View Project</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
</head>

<body onload="startTime()">

    <div id="txt"></div>-->

        <?php
        /*
         * 
         * ~~~~~~~~~~REUSEABLE CODE BELOW~~~~~~~~~~~~~~
         * 
         */
             
        /*
         * include the data base connect file
         * and helper functions as if we are adding
         * the code on the page
         */
         //include './functions.php';

        /*
         * get and hold a database connection 
         * into the $db variable
         */
        //$db = getDatabase();

        /*
         * create a variable to hold the database
         * SQL statement
         */
        //$stmt = $db->prepare("SELECT * FROM corps");

        /*
         * We execute the statement and make sure we
         * got some results back.
         */
       // $results = array();
        //if ($stmt->execute() && $stmt->rowCount() > 0) {
     //       $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
       // }
        ?>
<!--        <div class="container">
            <div class="h1">Project View</div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>PROJECTS</th>
                        <th>Data One</th>
                        <th>Data Two</th>
                        <th>PROJECT MANAGERS</th>
                        <th></th>
                    </tr>
                </thead>
                <?php
                /*
                 * Use a for each loop to go through the
                 * associative array. $results is a multi 
                 * dimensional array. Arrays with arrays.
                 * 
                 * So we loop through each result to get back
                 * an array with values
                 * 
                 * feel free to 
                 * <?php echo print_r($results); ?>
                 * to see how the array is structured
                 */            
                ?>

                <?php //foreach ($results as $row): ?>
                <tr>
                    <th>1</th>
                    <th>Project A</th>
                    <th>Frank Jones</th>
                    
                    <td><?php //echo $row['id']; ?></td>
                    <td><?php //echo $row['corp']; ?></td>
                    <td><?php //echo $row['email']; ?></td>
                    <td><?php //echo $row['zipcode']; ?></td>
                    <td><?php //echo $row['owner']; ?></td>
                    <td><?php //echo $row['phone']; ?></td>
                    
                    <td><?php //echo $row['corp']; ?></td> 
                    
                    <td><a href="Read.php?id=<?php //echo $row['id']; ?>"<span class="badge badge-success"></span>Read</a></td>            
                    <td><a href="Update.php?id=<?php //echo $row['id']; ?>"<span class="badge badge-warning"></span>Update</a></td> 
                    <td><a href="Delete.php?id=<?php //echo $row['id']; ?>"<span class="badge badge-danger"></span>Delete</a></td>            
                </tr>
                <tr>
                    <th>2</th>
                    <th>Project B</th>
                    <th>Keith Smith</th>
                       <td><?php //echo $row['corp']; ?></td>                 
                    <td><a href="Read.php?id=<?php //echo $row['id']; ?>"<span class="badge badge-success"></span>Read</a></td>            
                    <td><a href="Update.php?id=<?php //echo $row['id']; ?>"<span class="badge badge-warning"></span>Update</a></td> 
                    <td><a href="Delete.php?id=<?php //echo $row['id']; ?>"<span class="badge badge-danger"></span>Delete</a></td>            
                </tr>
                <tr>
                    <th>3</th>
                    <th>Project C</th>
                    <th>Thomas Holmes</th>
                       <td><?php //echo $row['corp']; ?></td>                 
                    <td><a href="Read.php?id=<?php //echo $row['id']; ?>"<span class="badge badge-success"></span>Read</a></td>            
                    <td><a href="Update.php?id=<?php //echo $row['id']; ?>"<span class="badge badge-warning"></span>Update</a></td> 
                    <td><a href="Delete.php?id=<?php //echo $row['id']; ?>"<span class="badge badge-danger"></span>Delete</a></td>            
                </tr>
            <?php// endforeach; ?>
            </table>
        </div>
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

       <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    

    </head>
    <body>
<?php

//This can be moved to functions.php
//
// Convert date strings to a date
//

//$date1 = date_create("2018-12-01 06:05:30");
//echo "date1 = ".$date1->format("Y-m-d H:i:s")."<br>";
//
//$date2 = date_create("2018-12-01 10:00:57");
//echo "date2 = ".$date2->format("Y-m-d H:i:s")."<br>";
//
//// Calculates the difference results is a time interval 
//
//$interval = date_diff($date1,$date2);
//
//var_dump($interval);
//
//$time = sprintf('%d:%02d:%02d', ($interval->d * 24) + $interval->h, $interval->i, $interval->s);
//
//echo "Duration = ".$time;




include_once 'functions.php';
include './prototype_main.php';
$results = getAllData();
?>   
        
    <div class="container">
            <div class="h1">Project View</div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>PROJECTS</th>
                        <th>PROJECT MANAGERS</th>
                        <th>CHECK IN</th>
                        <th>CHECK OUT</th>
                        <th>DURATION</th>
                        
                        <th></th>
                    </tr>
                </thead>

                    <?php foreach ($results as $row): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['projectName']; ?></td>
                            <td><?php echo $row['projectManager']; ?></td>
                            <td><?php echo date("m/d/y",strtotime($row['projectCheckIn'])); ?></td> 
                            <td><?php echo date("m/d/y",strtotime($row['projectCheckOut'])); ?></td>
                            <td><?php echo date("m/d/y",strtotime($row['projectDuration'])); ?></td>
                        </tr>
                    <?php endforeach; ?>

                </table>
            </div>
        </div>
            </body>
</html>
