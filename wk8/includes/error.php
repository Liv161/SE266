<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Sorry an error has occurred...</h1>
        <h2>
        <?php        
            if ( isset($message) ) {
              echo $message;  
            }            
        ?>
        </h2>
    </body>
</html>
