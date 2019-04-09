<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Delete Corporation</title>
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
            $stmt = $db->prepare("SELECT corp FROM corps WHERE id = :id");
            $binds = array(
                ":id" => $id
            );
            //var_dump($stmt); die();
            $corp = '';
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $corp = $results[0]['corp'];
                
            }              
            
            $stmt = $db->prepare("DELETE FROM corps where id = :id");
            
            $binds = array(
                ":id" => $id
            );

       
        $isDeleted = false;
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $isDeleted = true;
        }       
        
        ?>
        
        
        <h1> Test Record <?php echo $corp. 'Id '.$id; ?>
         <?php if ( !$isDeleted ): ?> 
          Not
        <?php endif; ?>
        Deleted</h1>
        
        <p> <a href="view-action.php">View page</a></p>
        
        
        
    </body>
</html>
