<?php

// Convert date strings to a date

$date1 = date_create("2018-12-01 06:05:30");
echo "date1 = ".$date1->format("Y-m-d H:i:s")."<br>";

$date2 = date_create("2018-12-01 10:00:57");
echo "date2 = ".$date2->format("Y-m-d H:i:s")."<br>";

// Calculates the difference results is a time interval 

$interval = date_diff($date1,$date2);

var_dump($interval);

$time = sprintf('%d:%02d:%02d', ($interval->d * 24) + $interval->h, $interval->i, $interval->s);

echo "Duration = ".$time;

?>

<!DOCTYPE html>
<html>
<head>
<script>
function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('txt').innerHTML =
  h + ":" + m + ":" + s;
  var t = setTimeout(startTime, 500);
}
function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}
</script>
</head>

<body onload="startTime()">

<div id="txt"></div>

</body>
</html>

<form action="#" method="post">
    <fieldset>
        <legend>Time Clock</legend>
        
        <label>CHECK IN</label>  
        <input type="radio" name="date1" value="Punched In" />
         <label>CHECK OUT</label>  
        <input type="radio" name="date2" value="Punched Out" />

        <label></label>  
<!--        <p id="datetime"></p>
        <script>
var dt = new Date();
document.getElementById("datetime").innerHTML = dt.toLocaleTimeString();
</script>-->
        
        <input type="hidden" name="action" value="Submit1" />
        <input type="submit" value="Submit1" />
    </fieldset>    
</form>