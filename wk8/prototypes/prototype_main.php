<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Project Home</title>
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
        <?php
        // put your code here
        ?>
        <div style="border:2px solid black">
        <form action="#" method="post">        
    
        <legend><h1>Project Records</h1></legend>
        
        <label>Check In</label>  
        <input type="radio" name="check_in" id='check_in' value="In" />
        <label>Check Out</label>
        <input type="radio" name="check_out" id='check_out' value="Out" />
        &nbsp;
        <label>Projects</label>  
        <select name="projects" id="selection">
            <option name="blank" value="select"></option>
            <option value="project_a">Project A</option>
            <option value="project_b">Project B</option>
            <option value="project_c">Project C</option>
        </select>
        <br>        
        
</form>
        <script>
        function nextPage(){           
            if(document.getElementById("check_in").checked === true && document.getElementById("selection").name === "projects")
            {
                window.location.href="project_time.php";
            }
            else if(document.getElementById("check_out").checked === true && document.getElementById("selection").name === "projects")
            {
                window.location.href="prototype_view.php";
            }
            
            else if(document.getElementById("check_in").checked === true || document.getElementById("check_out").checked === true && document.getElementById("selection").value === "select" )
            {
                window.location.href="prototype_main.php";
            } 
            else
            {
                window.location.href="prototype_main.php";
            }
        }        
        </script>
        <input type="hidden" name="action" value="Submit" />
        <input type="submit" onclick="nextPage()" value="Submit" />
        </div>
    </body>
</html>
