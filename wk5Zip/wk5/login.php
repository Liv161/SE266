<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">         
        <title>Login Page</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php
         session_start();
        
        include './functions/dbData.php';
        include './functions/header.php';
       
        $resulter = '';
        $submit = filter_input(INPUT_POST,'submit');
        if (isset($submit)){
            
            $username = filter_input(INPUT_POST,'username');
            $password = filter_input(INPUT_POST, 'password');
            $results = login($username, $password);
//            $pw = hash_password($password, PASSWORD_DEFAULT);
//            var_dump($pw);
            if($results == ''){
                $resulter = 'Invalid Entry';
            }
            else{
//                foreach ($results as $row): //Just one row
//                    $userName = $row['username'];
//                    $passWord = $row['password'];
               // endforeach;
                $_SESSION['loggedin'] = true;
                 header('Location: fileUpload.php');  
            }
            
        }
        ?>
        
        <form style="margin-top: 10%; border: 2px solid black; background: lightgray "action="" method="post">
            <h1 style="text-align: center">Welcome! Login Here</h1>
            <table align="center" >
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" placeholder="enter your username"></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" placeholder="enter your password"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Login"></td>
                </tr>
                <?php echo $resulter; ?>
                                
            </table>
        </form>
       
    </body>
</html>