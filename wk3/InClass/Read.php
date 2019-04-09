<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Read</title>
    </head>
    <body>
        <?php
        
            include './dbconnect.php';
            include './functions.php';

            /*
             * get and hold a database connection 
             * into the $db variable
             */
            $db = getDatabase();
            
            $id = filter_input(INPUT_GET, 'id'); 
            $stmt = $db->prepare("SELECT dataone, datatwo FROM test WHERE id = :id");
            $binds = array(
                ":id" => $id
            );
            //var_dump($stmt); die();
            $dataone = '';
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $dataone = $results[0]['dataone'];
                $datatwo = $results[0]['datatwo'];
            }              
        
        ?>
        <h1>Read: Record <?php echo $id?></h1>
        <form name="formView" method="GET">
            <label for="dataone">Data One: </label>
            <input type="text" name="dataone" value="<?php echo $dataone;?>" readonly="readonly"><br>
            <label for="datatwo">Data Two: </label>
            <input type="text" name="datatwo" value="<?php echo $datatwo;?>" readonly="readonly"><br>
            <input type="hidden" value="<?php echo $id?>" name="id"/>
        </form>

        
        <p> <a href="view-action.php">View page</a></p>
       
    </body>
</html>

