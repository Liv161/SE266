<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Corporation</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Corporation Database</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="addCorp.php">Insert Corporation <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="view-action-bootstrap.php">Select Corporation</a>
      <a class="nav-item nav-link" href="view-datetime.php">Corporation Dates</a>
    </div>
  </div>
</nav>
    </head>
    <body>
        
        <!--<h1>Corporation Entry</h1>-->
        <?php
        include './dbconnect.php';
        include './functions.php';
        $results = 'Corporation Entry';

        if (isPostRequest()) {
            $db = getDatabase();
            $stmt = $db->prepare("INSERT INTO corps SET corp = :corp, incorp_dt = now(), email = :email, zipcode = :zipcode, owner = :owner, phone = :phone");
            
            $corp = filter_input(INPUT_POST, 'corp');
            $email = filter_input(INPUT_POST, 'email');
            $zipcode = filter_input(INPUT_POST, 'zipcode');
            $owner = filter_input(INPUT_POST, 'owner');
            $phone = filter_input(INPUT_POST, 'phone');

            $binds = array(
                ":corp" => $corp,
                ":email" => $email,
                ":zipcode" => $zipcode,
                ":owner" => $owner,
                ":phone" => $phone
            );

            /*
             * empty()
             * isset()
             */

            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = 'Corporation Added';
            }
        }
        ?>       

        <form style="text-align: Center" method="post" action="#"> 
            <h1 style="margin-top: 2%;margin-bottom: 2%"><?php echo $results; ?></h1>
            Corporation <br /> <input type="text" value="" name="corp" />
            <br />
            Email <br /> <input type="text" value="" name="email" />
            <br />
            Zip Code <br /> <input type="text" value="" name="zipcode" />
            <br />
            Owner <br /> <input type="text" value="" name="owner" />
            <br />
            Phone <br /> <input type="text" value="" name="phone" />
            <br />
           

            <br /> <input type="submit" value="Submit" />      
             <footer style="margin-top: 2%; font-size: 8px">
            <?php
                echo '<p class="footer"> &copy; 2019,Livio Delacruz | PHP</p>'
            ?>
	</footer>
        </form>
       
    </body>
</html>