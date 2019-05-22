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
  <a class="navbar-brand" href="#">Project Center</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="addproject.php">New Project</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="viewproject.php">Project Management</a>
      </li>
    </ul>
  </div>
</nav>
    </head>
    <body>
    
        <?php        
            include './functions/dbData.php';

            /*
             * get and hold a database connection 
             * into the $db variable
             */
            $db = getDatabase();
            
             $id = filter_input(INPUT_GET, 'id'); 
            $stmt = $db->prepare("SELECT id, projectName, projectManager, projectCheckIn, projectCheckOut, projectCreated FROM projects WHERE id = :id");
            $binds = array(
                ":id" => $id
            );
            //var_dump($stmt); die();
            $dataone = '';
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $id = $results[0]['id'];
                $projectName = $results[0]['projectName'];
                $projectManager = $results[0]['projectManager'];
                $projectCheckIn = $results[0]['projectCheckIn'];
                $projectCheckOut = $results[0]['projectCheckOut'];
                $projectCreated = $results[0]['projectCreated'];
            }
             if ($stmt->execute($binds) && $stmt->rowCount() > 0) 
                {
                    //if ($stmt->rowCount() > 0) {
                    $results = $stmt->fetch(PDO::FETCH_ASSOC);
                    $projectName = $results['projectName'];
                    $projectManager = $results['projectManager'];
                    $projectCheckIn = $results['projectCheckIn'];
                    $projectCheckOut = $results['projectCheckOut'];
                    $projectCreated = $results['projectCreated'];
                    //var_dump($results);
                    $check_in = new DateTime($projectCheckIn);
                    //$check_in->format("Y-m-d H:i:s");
                    $check_out = new DateTime($projectCheckOut);
                    //$check_out->format("Y-m-d H:i:s");
                    $interval = date_diff($check_in,$check_out);
                    $time = sprintf('%d:%02d:%02d', ($interval->d * 24) + $interval->h, $interval->i, $interval->s);                            
                }  
        
        ?>
        <h1 style="margin-left: 3%">Read: Record <?php echo $id?></h1>
        <form style="margin-left: 5%" name="formView" method="GET">
            <label for="id">ID: </label><br>
            <input type="text" name="id" value="<?php echo $id;?>" readonly="readonly"><br>
            <label for="proName">Project Name: </label><br>
            <input type="text" name="projectName" value="<?php echo $projectName;?>" readonly="readonly"><br>
            <label for="proManager">Project Manager: </label><br>
            <input type="text" name="projectManager" value="<?php echo $projectManager;?>" readonly="readonly"><br>
            <label for="in">Check In: </label><br>
            <input type="text" name="projectCheckIn" value="<?php echo $projectCheckIn;?>" readonly="readonly"><br>
            <label for="out">Check Out: </label><br>
            <input type="text" name="projectCheckOut" value="<?php echo $projectCheckOut;?>" readonly="readonly"><br>
            <label for="duration">Duration: </label><br>
            <input type="text" name="projectDuration" value="<?php echo $time;?>" readonly="readonly"><br>
            <input type="hidden" value="<?php echo $id?>" name="id"/>
        </form>

        
        <p style="margin-left: 5%"> <a href="viewproject.php">View page</a></p>
       
    </body>
</html>

