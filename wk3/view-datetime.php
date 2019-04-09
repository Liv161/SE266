<!--

********************************************************

RUN THE SQL FILE BEFORE YOU CONTINUE WITH THIS DEMO

********************************************************

-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
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
       <!-- Latest compiled and minified CSS -->
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

       <!-- Optional theme -->
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">   
          </head>
          <body>
        <?php
        /*
         * include the data base connect file
         * and helper functions as if we are adding
         * the code on the page
         */
        include './dbconnect.php';
        include './functions.php';

        /*
         * get and hold a database connection 
         * into the $db variable
         */
        $db = getDatabase();

        /*
         * create a variable to hold the database
         * SQL statement
         */
        $stmt = $db->prepare("SELECT * FROM corps");

        /*
         * We execute the statement and make sure we
         * got some results back.
         */
        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        ?>
        
        <div class="container">
        <div class="h1">Corporation Dates</div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Corporations</th>
                    <th>Date</th>
                </tr>
            </thead>
        </div>
            <?php
            /*
             * Use a for each loop to go through the
             * associative array. $results is a multi 
             * dimensional array. Arrays with arrays.
             * 
             * So we loop through each result to get back
             * an array with values
             * 
             * feel free to 
             * <?php echo print_r($results); ?>
             * to see how the array is structured
             */ 
            
            
            /*
             * http://us.php.net/manual/en/function.date.php
             *  Desired Text            Code
                August 07, 2015         date("F d, Y",strtotime($myrow['date']));
                Friday, August 07, 2015	date("l, F d, Y",strtotime($myrow['date']));
                Aug 07, 2015            date("M d, Y",strtotime($myrow['date']));
                07 August 2015          date("d F Y",strtotime($myrow['date']));
                07 Aug 2015             date("d M Y",strtotime($myrow['date']));
                Fri, 07 Aug 2015	date("D, d M Y",strtotime($myrow['date']));
             */
            ?>
            
            <?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['corp']; ?></td>           
                    <td><?php echo  date("F d, Y",strtotime($row['incorp_dt'])); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        
    </body>
</html>
