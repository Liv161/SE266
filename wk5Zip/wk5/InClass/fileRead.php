<?php
   // store in array
   $names = file('names.txt');
   //var_dump ($names);
    // one line at a time
   $file = fopen ('names.txt', 'rb');
    while (!feof($file)) {
       $name = fgets ($file);
       //echo $name . "<br />";
    }
   //for comma-delimited files or CSVs (Comma Separated Values) use fopen in combination with fgetcsv.
    $file = fopen ('schools.csv', 'rb');
 
    while (!feof($file)) {
       $school = fgetcsv($file);
       echo ($school[0]) . "<br />";
    }
?>