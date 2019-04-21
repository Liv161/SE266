<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
    </head>
    <body>
        <?php
        
           include_once './functions/dbconnect.php';
                      
           $db = dbconnect();
           $column = 'datatwo';
           $order = 'ASC'; //DESC
           $stmt = $db->prepare("SELECT * FROM test ORDER BY $column $order");

             $results = array();
             if ($stmt->execute() && $stmt->rowCount() > 0) {
                 $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
             }
          
        ?>
        
        
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Data One</th>
                    <th>Data Two</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['dataone']; ?></td>
                    <td><?php echo $row['datatwo']; ?></td> 
                     </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        
       
    </body>
</html>
