<?php
/**
 * Function to establish a database connection
 * 
 * @return PDO Object
 */  
function dbconnect() {
    
        /* PHP script runs local or remote. Database server remote */
        /* 
            *********************************************************************************

            BE SURE TO CHANGE THIS TO USE YOUR OWN dbname, user name and password! 
                
                dbname: se266_[firstname]
                DB_USER:  se266_[firstname]
	            DB_PASSWORD: studentidwithoutleadingzeroes
            	
           *********************************************************************************    
        */
        $config = array(
            'DB_DNS' => 'mysql:host=ict.neit.edu;port=5500;dbname=se266_000926501;',
            'DB_USER' => 'se266_000926501',
            'DB_PASSWORD' => '000926501'
        );
        
        
         /* PHP script runs local. Database Server local */
       /*
        $config = array(
            'DB_DNS' => 'mysql:host=192.168.10.10;port=3306;dbname=se266_erik;',
            'DB_USER' => 'homestead',
            'DB_PASSWORD' => 'secret'
        );
        */
        /* Create a Database connection and save it into the variable */
        
        try {
            $db = new PDO($config['DB_DNS'], $config['DB_USER'], $config['DB_PASSWORD']);
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (Exception $ex) {
            echo $ex->getMessage();
            $db = null;
        }
        

    return $db;
}

?>