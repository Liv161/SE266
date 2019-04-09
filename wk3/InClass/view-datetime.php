<!--

********************************************************

RUN THE SQL FILE BEFORE YOU CONTINUE WITH THIS DEMO

********************************************************

-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
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

        <h1>Date time results</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Data One</th>
                    <th>Data Two</th>
                    <th>Date</th>
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
            
            
            /*
             * http://us.php.net/manual/en/function.date.php
             *  Desired Text            Code
                August 07, 2015         date("F d, Y",strtotime($myrow['date']));
                Friday, August 07, 2015	date("l, F d, Y",strtotime($myrow['date']));
                Aug 07, 2015            date("M d, Y",strtotime($myrow['date']));
                07 August 2015          date("d F Y",strtotime($myrow['date']));
                07 Aug 2015             date("d M Y",strtotime($myrow['date']));
                Fri, 07 Aug 2015	date("D, d M Y",strtotime($myrow['date']));
             */
            ?>
            
            <?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['dataone']; ?></td>
                    <td><?php echo $row['datatwo']; ?></td>            
                    <td><?php echo  date("F d, Y",strtotime($row['date'])); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        
        <p><a href="AddDemo.php">Add Data</a></p>

    </body>
</html>
