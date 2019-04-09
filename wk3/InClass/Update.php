<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
            include './dbconnect.php';
            include './functions.php';
            
            
            $db = getDatabase();
            
            $result = '';
            $dataone = '';
            $datatwo = '';
//            var_dump($_SERVER);die();
            if (isPostRequest()) {
                $id = filter_input(INPUT_POST, 'id');
                $dataone = filter_input(INPUT_POST, 'dataone');
                $datatwo = filter_input(INPUT_POST, 'datatwo');
                $stmt = $db->prepare("UPDATE test set dataone = :dataone, datatwo = :datatwo where id = :id");
                
                $binds = array(
                    ":id" => $id,
                    ":dataone" => $dataone,
                    ":datatwo" => $datatwo
                );
                
                if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                   $result = 'Record updated';
                } 
            } else {
                // Update.php?id=1
                $id = filter_input(INPUT_GET, 'id');
                $stmt = $db->prepare("SELECT * FROM test where id = :id");
                $binds = array(
                    ":id" => $id
                );
                if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                    //if ($stmt->rowCount() > 0) {
                   $results = $stmt->fetch(PDO::FETCH_ASSOC);
                    $dataone = $results['dataone'];
                    $datatwo = $results['datatwo'];
                    //} else {
                    
                    //}
                } else {
                  echo 'Record not found';  
                }
                // Indicates update 
                if ( !isset($id) ) {
                    echo 'Record not found';
                }
            }
        
        ?>
        
        <h1><?php echo $result; ?></h1>
        
        <form method="post" action="#">            
            Data one <input type="text" value="<?php echo $dataone; ?>" name="dataone" />
            <br />
            Data two <input type="text" value="<?php echo $datatwo; ?>" name="datatwo" />
            <br />  
            <input type="hidden" value="<?php echo $id; ?>" name="id" /> 
            <input type="submit" value="Update" />
        </form>
        
        <p> <a href="view-action.php">View page</a></p>
        
    </body>
</html>
