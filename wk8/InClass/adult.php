<?php

    
    $age = filter_input(INPUT_GET, 'age');
    if ($age <18) {
        echo "You're just a kid !!!";
    } else {
        echo "You're an adult !!!";
    }
?>