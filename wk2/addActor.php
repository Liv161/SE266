<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Actor</title>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
            body{
                text-align: center;
            }
        </style>
       
    </head>
    <body>
        <?php
        include './InClass/dbConnect.php';
        include './InClass/functions.php';
        include './header.php';
        
        $results = '<h1>Add Actor</h1>';

        if (isPostRequest()) {
            $db = getDatabase();

            $stmt = $db->prepare("INSERT INTO actors SET id = :id, firstname = :firstname, lastname = :lastname, dob = :dob, height = :height");

            $id = filter_input(INPUT_POST, 'id');
            $firstname = filter_input(INPUT_POST, 'firstname');
            $lastname = filter_input(INPUT_POST, 'lastname');
            $dob = filter_input(INPUT_POST, 'dob');
            $height = filter_input(INPUT_POST, 'height');

            $binds = array(
                ":id" => $id,
                ":firstname" => $firstname,
                ":lastname" => $lastname,
                ":dob" => $dob,
                ":height" => $height
            );

            /*
             * empty()
             * isset()
             */

            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = 'Actor Added';
            }
        }
        ?>


        <h1><?php echo $results; ?></h1>

        <form method="post" action="#">       
            ID <br /> <input type="text" value="" name="id" />
            <br />
            First Name <br /> <input type="text" value="" name="firstname" />
            <br />
            Last Name <br /> <input type="text" value="" name="lastname" />
            <br />
            Date of Birth <br /> <input type="text" value="" name="dob" />
            <br />
            Height <br /> <input type="text" value="" name="height" />
            <br />
           

            <br /> <input type="submit" value="Submit" />
        </form>
    </body>
</html>

