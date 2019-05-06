<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">         
        <title>Search</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <body>
<?php
   session_start();
   include_once './functions/header.php';
   include_once './functions/dbData.php';
   include_once './functions/utility.php';
   
    if(!isLoggedIn())
    {
         header ('Location: login.php');
         die();//Kills the session
    }
    include_once './functions/dbData.php';
           
         $results = '';
           
         $action = filter_input(INPUT_GET, 'action');
         
    if( $action === 'Search')
          {
            $schoolkey = filter_input(INPUT_GET, 'schoolkey');
            $citykey = filter_input(INPUT_GET, 'citykey');
            $statekey = filter_input(INPUT_GET, 'statekey');
            
            if($schoolkey === '' && $citykey === '' && $statekey === '')
            {
                $results = allSchools();
                
                $count = allSchoolCount();
                
                if($count > 0){
                     echo '<br>';
                     echo '<br>';
                                          
                echo "ROW COUNT: {$count}";
                
                echo '<br>';
                echo '<br>';
              }
              else
              {
                  echo '<br>';
                  echo '<br>';
                  
                  echo "NO RESULTS FOUND!!";
                  
                  echo '<br>';
                  echo '<br>';
              }
                
            }
            else {
                $results = searchSchools($schoolkey, $citykey, $statekey);
                
                $count = schoolCount1($schoolkey, $citykey, $statekey);
               
               
                
                 if($count > 0){
                     echo '<br>';
                     echo '<br>';
                                          
                echo "ROW COUNT: {$count}";
                
                echo '<br>';
                echo '<br>';
              }
              else
              {
                  echo '<br>';
                  echo '<br>';
                  
                  echo "NO RESULTS FOUND!!";
                  
                  echo '<br>';
                  echo '<br>';
              }                
            }         
          }
        ?>
        
        <div>     
             <form style="margin-top: 10%; border: 2px solid black; background: lightgray "action="" method="get">
            <h1 style="text-align: center">School Search</h1>
            <table align="center" >
                <tr>
                    <td>School Name:</td>
                    <td><input type="text" name="schoolkey" placeholder="School search"></td>
                </tr>
                <tr>
                    <td>City:</td>
                    <td><input type="text" name="citykey" placeholder="City search"></td>
                </tr>
                <tr>
                    <td>State:</td>
                    <td><input type="text" name="statekey" placeholder="State search"></td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="search" value="Search"/>
                        <input type="hidden" name="action" value="Search" /> 
                    </td>
                </tr>                                
            </table>
        </form> 
            
        </div>
        
        <div>
            
            <div class="row justify-content-center">
                <table style="margin-top: 2%; margin-left: 2%; margin-right: 2% " class="table" width="100%" border="0">
                    <thead>
                        <tr>
                            
                            <th>ID</th>
                            <th>School Name</th>
                            <th>City</th>
                            <th>State</th>
                            
                        </tr>                      
                    </thead>
                    
                    <?php foreach ($results as $row): ?>
                    <tr>
                       <td><?php echo $row['id']; ?></td>
                       <td><?php echo $row['school_name']; ?></td>
                       <td><?php echo $row['city']; ?></td>
                       <td><?php echo $row['state']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                    
                </table>                
            </div>            
        </div>        
    </body>
</html>
