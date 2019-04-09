<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Example | View | Bootstrap </title>
        
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
        include './header.php';

        /*
         * get and hold a database connection 
         * into the $db variable
         */
        $db = getDatabase();

        /*
         * create a variable to hold the database
         * SQL statement
         */
        $stmt = $db->prepare("SELECT * FROM test");

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
            <div class="h1">View Action - Bootstrap</div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Data One</th>
                        <th>Data Two</th>
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
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['dataone']; ?></td>
                        <td><?php echo $row['datatwo']; ?></td>            
                        <td><a class="btn btn-warning btn-sm" href="Update.php?id=<?php echo $row['id']; ?>"><i class="glyphicon glyphicon-pencil"></i> Update</a></td>            
                        <td><a class="btn btn-danger btn-sm" href="Delete.php?id=<?php echo $row['id']; ?>"><i class="glyphicon glyphicon-trash"></i> Delete</a></td>            
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>
