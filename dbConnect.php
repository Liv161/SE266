<?php

echo "Hello World!","<br>";

/**
 * Function to establish a database connection
 * 
 * @return PDO Object
 */  
function getDatabase() {
    
        /* PHP script runs local or remote. Database server remote */
    
        $config = array(
            'DB_DNS' => 'mysql:host=ict.neit.edu;port=5500;',
            'DB_USER' => 'se266_000926501',
            'DB_PASSWORD' => '000926501'
        );
        
        
         /* PHP script runs local. Database Server local */
       /*
        $config = array(
            'DB_DNS' => 'mysql:host=192.168.10.10;port=3306;',
            'DB_USER' => 'homestead',
            'DB_PASSWORD' => 'secret'
        );
       */
        /* Create a Database connection and save it into the variable */
        $db = new PDO($config['DB_DNS'], $config['DB_USER'], $config['DB_PASSWORD']);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        
    return $db;
}
$testDB = getDatabase();
print_r ($testDB);
?>
