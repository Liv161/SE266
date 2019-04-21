<?php

    $s = "PHP ROCKS";

    // note the difference between double and single quotes
    echo "$s<br />";
    echo '$s<br />';
   
    // time is displayed in either minutes or hours:minutes. Convert to minutes
    function getMinutes ($duration) {
        if (strpos ($duration, ":") > 0) {
            $arr = explode (":", $duration);
            return ($arr[0] * 60 + $arr[1]);
        } else {
            return ($duration);
        }
    }
    
    echo getMinutes ("1:20");
    echo "<br />";
    echo getMinutes ("120");
    
    
?>


