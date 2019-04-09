<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Update Corporation</title>
    </head>
    <body>
        <?php
        
            include './dbconnect.php';
            include './functions.php';
            
            
            $db = getDatabase();
            
            $result = '';
            $corp = '';
            $email = '';
            $zipcode = '';
            $owner = '';
            $phone = '';
            
//            var_dump($_SERVER);die();
            if (isPostRequest()) {
                $id = filter_input(INPUT_POST, 'id');
                $corp = filter_input(INPUT_POST, 'corp');
                $email = filter_input(INPUT_POST, 'email');
                $zipcode = filter_input(INPUT_POST, 'zipcode');
                $owner = filter_input(INPUT_POST, 'owner');
                $phone = filter_input(INPUT_POST, 'phone');
                $stmt = $db->prepare("UPDATE corps set corp = :corp, email = :email, zipcode = :zipcode, owner = :owner, phone = :phone where id = :id");
                
                $binds = array(
                    ":id" => $id,
                    ":corp" => $corp,
                    ":email" => $email,
                    ":zipcode" => $zipcode,
                    ":owner" => $owner,
                    ":phone" => $phone
                );
                
                if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                   $result = 'Record updated';
                } 
            } else {
                // Update.php?id=1
                $id = filter_input(INPUT_GET, 'id');
                $stmt = $db->prepare("SELECT * FROM corps where id = :id");
                $binds = array(
                    ":id" => $id
                );
                if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                    //if ($stmt->rowCount() > 0) {
                   $results = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                    $corp = $results['corp'];
                    $email = $results['email'];
                    $zipcode = $results['zipcode'];
                    $owner = $results['owner'];
                    $phone = $results['phone'];
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
            ID <br /> <input type="text" value="<?php echo $id; ?>" name="id" />
            <br />
            Corporation <br /> <input type="text" value="<?php echo $corp; ?>" name="corp" />
            <br />
            Email <br /> <input type="text" value="<?php echo $email; ?>" name="email" />
            <br />
            Zip Code <br /> <input type="text" value="<?php echo $zipcode; ?>" name="zipcode" />
            <br />
            Owner <br /> <input type="text" value="<?php echo $owner; ?>" name="owner" />
            <br />
            Phone <br /> <input type="text" value="<?php echo $phone; ?>" name="phone" />
            <br />
           
            <input type="hidden" value="<?php echo $id; ?>" name="id" /> 
            <input type="submit" value="Update" />
        </form>
        
        <p> <a href="view-action.php">View page</a></p>
        
    </body>
</html>
