<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Read Project</title>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
       <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="prototype_main.php">Project Management</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="addproject.php">New Project</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="prototype_view.php">View Project</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
    </head>
    <body>
        <?php
//        
//            include './dbconnect.php';
//            include './functions.php';
//
//            /*
//             * get and hold a database connection 
//             * into the $db variable
//             */
//            $db = getDatabase();
//            
//            $id = filter_input(INPUT_GET, 'id'); 
//            $stmt = $db->prepare("SELECT id, corp, email, zipcode, owner, phone FROM corps WHERE id = :id");
//            $binds = array(
//                ":id" => $id
//            );
//            //var_dump($stmt); die();
//            $dataone = '';
//            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
//                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
//                $id = $results[0]['id'];
//                $corp = $results[0]['corp'];
//                $email = $results[0]['email'];
//                $zipcode = $results[0]['zipcode'];
//                $owner = $results[0]['owner'];
//                $phone = $results[0]['phone'];
//            }              
//        
        ?>
        <h1>Read: Record 1<?php // echo $id?></h1>
        <form method ="post" action="prototype_main.php">
            Project ID</br> <input type="text" value="" name="projectid" placeholder="1" readonly="readonly"/>
    <br />        
    Project Name</br> <input type="text" value="" name="projectName"  placeholder="Project A" readonly="readonly"/>
    <br />
    Project Manager <br /> <input type="text" value="" name="owner"  placeholder="Frank Jones" readonly="readonly" />
    <br />
        </form>
<!--        <form name="formView" method="GET">
            <label for="id">ID: </label><br>
            <input type="text" name="id" value="<?php echo $id;?>" readonly="readonly"><br>
            <label for="corp">Corporation: </label><br>
            <input type="text" name="corp" value="<?php echo $corp;?>" readonly="readonly"><br>
            <label for="email">Email: </label><br>
            <input type="text" name="email" value="<?php echo $email;?>" readonly="readonly"><br>
            <label for="zipcode">Zip Code: </label><br>
            <input type="text" name="zipcode" value="<?php echo $zipcode;?>" readonly="readonly"><br>
            <label for="owner">Owner: </label><br>
            <input type="text" name="owner" value="<?php echo $owner;?>" readonly="readonly"><br>
            <label for="phone">Phone: </label><br>
            <input type="text" name="phone" value="<?php echo $phone;?>" readonly="readonly"><br>
            <input type="hidden" value="<?php echo $id?>" name="id"/>
        </form>-->

        
<p> <a href="prototype_view.php">View page</a></p>
       
    </body>
</html>

