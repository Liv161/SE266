<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Test Data Entry</title>
    </head>
    <body>
        <?php
        include './dbconnect.php';
        include './functions.php';
        include './header.php';
        $results = '';

        if (isPostRequest()) {
            $db = getDatabase();

            $stmt = $db->prepare("INSERT INTO test SET dataone = :dataone, datatwo = :datatwo, date = now()");

            $dataone = filter_input(INPUT_POST, 'dataone');
            $datatwo = filter_input(INPUT_POST, 'datatwo');

            $binds = array(
                ":dataone" => $dataone,
                ":datatwo" => $datatwo
            );

            /*
             * empty()
             * isset()
             */
//CURDATE()
//date-default-timezone_set('America,New York');
//date('Y-m-d H:i:s'); 2019-04-08 6:00pm            
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = 'Data Added';
            }
        }
        ?>


        <h1><?php echo $results; ?></h1>

        <form method="post" action="#">            
            Data one <input type="text" value="" name="dataone" />
            <br />
            Data two <input type="text" value="" name="datatwo" />
            <br />
           

            <input type="submit" value="Submit" />
        </form>
        <p><a href="view-datetime.php">View Data</a></p>
    </body>
</html>