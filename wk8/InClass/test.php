<?php

$idx = $_GET['idx'];

$colors = array();
array_push ($colors, "red");
array_push ($colors, "blue");
array_push ($colors, "green");

$colors = json_encode ($colors);

echo $colors;
?>

