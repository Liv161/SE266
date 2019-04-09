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
            $stmt = $db->prepare("SELECT id, corp, email, zipcode, owner, phone FROM corps WHERE id = :id");
            $binds = array(
                ":id" => $id
            );
            //var_dump($stmt); die();
            $dataone = '';
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $id = $results[0]['id'];
                $corp = $results[0]['corp'];
                $email = $results[0]['email'];
                $zipcode = $results[0]['zipcode'];
                $owner = $results[0]['owner'];
                $phone = $results[0]['phone'];
            }              
        
        ?>
        <h1>Read: Record <?php echo $id?></h1>
        <form name="formView" method="GET">
            <label for="id">ID: </label><br>
            <input type="text" name="id" value="<?php echo $id;?>" readonly="readonly"><br>
            <label for="corp">Corporation: </label><br>
            <input type="text" name="corp" value="<?php echo $corp;?>" readonly="readonly"><br>
            <label for="email">Email: </label><br>
            <input type="text" name="email" value="<?php echo $email;?>" readonly="readonly"><br>
            <label for="zipcode">Zip Code: </label><br>
            <input type="text" name="zipcode" value="<?php echo $zipcode;?>" readonly="readonly"><br>
            <label for="owner">Owner: </label><br>
            <input type="text" name="owner" value="<?php echo $owner;?>" readonly="readonly"><br>
            <label for="phone">Phone: </label><br>
            <input type="text" name="phone" value="<?php echo $phone;?>" readonly="readonly"><br>
            <input type="hidden" value="<?php echo $id?>" name="id"/>
        </form>

        
        <p> <a href="view-action.php">View page</a></p>
       
    </body>
</html>

