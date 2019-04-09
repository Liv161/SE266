<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>View Actors</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <style>
            body{
                text-align: center;
            }
            table{
                float:left;
                margin-left: 780px;
            }
            
        </style>
        
    </head>
    <body>
        <?php
        /*
         * include the data base connect file
         * and helper functions as if we are adding
         * the code on the page
         */
        include './InClass/dbConnect.php';
        include './InClass/functions.php';
        include './header.php';
        echo '<h1>View Actors</h1>';
        /*
         * get and hold a database connection 
         * into the $db variable
         */
        $db = getDatabase();

        /*
         * create a variable to hold the database
         * SQL statement
         */
        $stmt = $db->prepare("SELECT id, firstname, lastname, dob, height FROM actors");

        /*
         * We execute the statement and make sure we
         * got some results back.
         */
        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        ?>

        <table style="border:1px solid black">
            <thead style="text-align: center">
                <tr>
                    <th style="border:1px solid black">ID</th>
                    <th style="border:1px solid black">First Name</th>
                    <th style="border:1px solid black">Last Name</th>
                    <th style="border:1px solid black">Date of Birth</th>
                    <th style="border:1px solid black">Height</th>
                </tr>
            </thead>
            <tbody style="text-align: center">
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
                    <td style="border:1px solid black"><?php echo $row['id']; ?></td>
                    <td style="border:1px solid black"><?php echo $row['firstname']; ?></td>
                    <td style="border:1px solid black"><?php echo $row['lastname']; ?></td>     
                    <td style="border:1px solid black"><?php echo $row['dob']; ?></td> 
                    <td style="border:1px solid black"><?php echo $row['height']; ?></td> 
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>
