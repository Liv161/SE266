<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Update Project</title>
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
        
//            include './dbconnect.php';
//            include './functions.php';
//            
//            
//            $db = getDatabase();
//            
//            $result = '';
//            $corp = '';
//            $email = '';
//            $zipcode = '';
//            $owner = '';
//            $phone = '';
//            
////            var_dump($_SERVER);die();
//            if (isPostRequest()) {
//                $id = filter_input(INPUT_POST, 'id');
//                $corp = filter_input(INPUT_POST, 'corp');
//                $email = filter_input(INPUT_POST, 'email');
//                $zipcode = filter_input(INPUT_POST, 'zipcode');
//                $owner = filter_input(INPUT_POST, 'owner');
//                $phone = filter_input(INPUT_POST, 'phone');
//                $stmt = $db->prepare("UPDATE corps set corp = :corp, email = :email, zipcode = :zipcode, owner = :owner, phone = :phone where id = :id");
//                
//                $binds = array(
//                    ":id" => $id,
//                    ":corp" => $corp,
//                    ":email" => $email,
//                    ":zipcode" => $zipcode,
//                    ":owner" => $owner,
//                    ":phone" => $phone
//                );
//                
//                if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
//                   $result = 'Record updated';
//                } 
//            } else {
//                // Update.php?id=1
//                $id = filter_input(INPUT_GET, 'id');
//                $stmt = $db->prepare("SELECT * FROM corps where id = :id");
//                $binds = array(
//                    ":id" => $id
//                );
//                if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
//                    //if ($stmt->rowCount() > 0) {
//                   $results = $stmt->fetch(PDO::FETCH_ASSOC);
//                   
//                    $corp = $results['corp'];
//                    $email = $results['email'];
//                    $zipcode = $results['zipcode'];
//                    $owner = $results['owner'];
//                    $phone = $results['phone'];
//                    //} else {
//                    
//                    //}
//                } else {
//                  echo 'Record not found';  
//                }
//                // Indicates update 
//                if ( !isset($id) ) {
//                    echo 'Record not found';
//                }
//            }
        
        ?>
        
        <h1>Update: Record 1<?php //echo $result; ?></h1>
        <form method ="post" action="prototype_view.php">
   Project Name</br> <input type="text" value="" name="projectName"  placeholder="Project A" />
    <br />
    Project Manager <br /> <input type="text" value="" name="owner"  placeholder="Frank Jones"/>
    <br />
    <input type="submit" value="Submit"/>
</form>
        
<!--          <form method="post" action="#">       
            ID <br /> <input type="text" value="<?php echo $id; ?>" name="id" />
            <br />
            Corporation <br /> <input type="text" value="<?php echo $corp; ?>" name="corp" />
            <br />
            Email <br /> <input type="text" value="<?php echo $email; ?>" name="email" />
            <br />
            Zip Code <br /> <input type="text" value="<?php echo $zipcode; ?>" name="zipcode" />
            <br />
            Owner <br /> <input type="text" value="<?php echo $owner; ?>" name="owner" />
            <br />
            Phone <br /> <input type="text" value="<?php echo $phone; ?>" name="phone" />
            <br />
           
            <input type="hidden" value="<?php echo $id; ?>" name="id" /> 
            <input type="submit" value="Update" />
        </form>-->
        
<p> <a href="prototype_view.php">View page</a></p>
        
    </body>
</html>
