<?php
    
    require 'functions.php';
    
    $results = '';
     if (isPostRequest()){
             $db = getDatabase();
             $projectName = filter_input(INPUT_POST, 'projectName');
            $results = addProject ($projectName);
            
         
        } 
?>

<form method ="post" action="addproject.php">
    Project Name:<input type="text" name="projectName" value=""/>
    <input type="submit" value="Submit"/>
</form>
<h1><?php echo $results; ?></h1>