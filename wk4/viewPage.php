<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

       <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    

    </head>
    <body>

        <?php
          
           include_once './functions/dbConnect.php';
           include_once './functions/dbData.php';
           $results = getAllCorpData();
           
           // hidden field with same name but different value in sortForm and searchForm
           $action = filter_input(INPUT_GET, 'action');
           
           if ( $action === 'sort' )
           {
               $column = filter_input(INPUT_GET, 'colum');
               $order = filter_input(INPUT_GET, 'order');
               
               $count = rowCount1($column, $order);
               
               if($count > 0){
                echo "ROW COUNT: {$count}";
              }
              else
              {
                  echo "NO RESULTS FOUND!!";
              }
               $results = getCorpSort($column, $order);
                           
           }
           
           else if ( $action === 'search' )
           {
               $colum = filter_input(INPUT_GET, 'colum');
               $keyword = filter_input(INPUT_GET, 'keyword');
               
              $count = rowCount2($colum, $keyword);
              
              if($count > 0){
                echo "ROW COUNT: {$count}";
              }
              else
              {
                  echo "NO RESULTS FOUND!!";
              }
               $results = getCorpSearch($colum, $keyword);
           }
           else if ($action === 'reset')
           {
               $results = getAllCorpData();
           }
           
             // include two forms 
            include './includes/searchForm.php';
            include './includes/sortForm.php';
        ?>   
        
    <div class="container">
        
        <div class="row justify-content-center">

                <table class="table" width="100%" border="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Corp</th>
                            <th>Date</th>
                            <th>Email</th>
                            <th>Zip Code</th>
                            <th>Owner</th>
                            <th>Phone</th>
                        </tr>
                    </thead>

                    <?php foreach ($results as $row): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['corp']; ?></td>
                            <td><?php echo date("m/d/y",strtotime($row['incorp_dt'])); ?></td> 
                            <td><?php echo $row['email'];  ?></td>   
                            <td><?php echo $row['zipcode'];  ?></td>
                            <td><?php echo $row['owner'];  ?></td>
                            <td><?php echo $row['phone'];  ?></td>
                        </tr>
                    <?php endforeach; ?>

                </table>
            </div>
        </div>
    </body>
</html>
