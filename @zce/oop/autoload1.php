<?php

spl_autoload_register(function($class) {
    $contains = fn($word) => stripos($class, $word) !== false;
    
    // relative to zce.php
    if($contains('controller')) {
        include "$class.php";
    }
    else if($contains('model')) {
        include "$class.php";
    }
});

use oop\controllers\ControllerOne;

$ctrl = new ControllerOne();
echo $ctrl->auth();

//