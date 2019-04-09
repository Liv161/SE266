<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>View | Corporation </title>
        
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Corporation Database</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-item nav-link" href="addCorp.php">Insert Corporation <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="view-action-bootstrap.php">Select Corporation</a>
            <a class="nav-item nav-link" href="view-datetime.php">Corporation Dates</a>
          </div>
        </div>
      </nav>
         <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">   

    </head>
    <body>
        <?php
        /*
         * include the data base connect file
         * and helper functions as if we are adding
         * the code on the page
         */
        include './dbconnect.php';
        include './functions.php';

        /*
         * get and hold a database connection 
         * into the $db variable
         */
        $db = getDatabase();

        /*
         * create a variable to hold the database
         * SQL statement
         */
        $stmt = $db->prepare("SELECT * FROM corps");

        /*
         * We execute the statement and make sure we
         * got some results back.
         */
        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        ?>
        <div class="container">
            <div class="h1">Corporation View</div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Corporation</th>
<!--                        <th>Data One</th>
                        <th>Data Two</th>-->
                        <th></th>
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

                <?php foreach ($results as $row): ?>
                <tr>
                    <!--
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['corp']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['zipcode']; ?></td>
                    <td><?php echo $row['owner']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    -->
                    <td><?php echo $row['corp']; ?></td> 
                    <td><a href="Read.php?id=<?php echo $row['id']; ?>"<span class="badge badge-success"></span>Read</a></td>            
                    <td><a href="Update.php?id=<?php echo $row['id']; ?>"<span class="badge badge-warning"></span>Update</a></td> 
                    <td><a href="Delete.php?id=<?php echo $row['id']; ?>"<span class="badge badge-danger"></span>
Delete</a></td>            
                </tr>
            <?php endforeach; ?>
            </table>
        </div>
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>
