<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/17/2019
 * Time: 3:34 PM
 */

function e() {
    echo "\n\n----\n\n";
}

e();

//practiceOne();
function practiceOne() {
    // try to fully grok variable functions
    $lambdaOne = function (int $x): string {
        return ($x * 0.5) . ' to ' . ($x * 1.5);
    };

    echo gettype($lambdaOne), ' | type $lambdaOne(2400) = ' . gettype($lambdaOne(2400));
    echo "\n\n lambdaOne class = " . get_class($lambdaOne);
    echo "\n\n hours to learn = " . $lambdaOne(2400);
}

e();

//$someNum = fatalErrorPrac(2,4);
//echo "some num = $someNum ", gettype($someNum);

function fatalErrorPrac(?float $x, ?float $y): float {
   return (double)$x * (double)$y;
}

if(!is_callable(function () {echo 'hello there';})) {
    function sayHello() {
        echo "Hello ^_^/";
    }
}

sayHello();

$break = 'point';