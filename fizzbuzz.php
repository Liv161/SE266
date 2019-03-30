<?php

 $myArray = array();
	for ($i = 0; $i < 101; $i++) {
	
            if($i % 2 == 0 && $i % 3 == 0){
                array_push($myArray, "Fizz Buzz");
            }
            elseif($i % 2 == 0){
                array_push($myArray, "Fizz");
            }
            elseif($i % 3 == 0){
                array_push($myArray, "Buzz");
            }
            else{
                array_push($myArray, $i);
            }
        }
        foreach ($myArray As $info){
            echo $info;
            echo "<br>";
        }

