<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/2/2019
 * Time: 6:00 PM
 */

// float to int prac
$x1 = (int)((0.1 + 0.7) * 10.0); // 0.7
$y1 = (int)((0.1 + 0.5) * 10.0); //0.6

$x2 = ((0.1 + 0.7) * 10.0); // 8.0
$x2a = (int)$x2; // this will still output 7... damn.
$x2b = (int)((string)$x2); // this fixes it, now it's 8
$y2 = ((0.1 + 0.5) * 10.0);
$y2 = (int)$y2;

echo "\n\nx1 = $x1, y1 = $y1\n\n";
echo "\n\nx2a = $x2a, x2b = $x2b, y2 = $y2\n\n";


// variable variable names
$a = 'rate' . whichRate(2);

$$a = '2.24';

$rate_one = $rate_one ?? null;
$rate_two = $rate_two ?? null;

if($rate_one) {
/** @var string $rate_one - is a variable variable */
echo "\n\n$rate_one\n\n";
}
else if($rate_two) {
/** @var string $rate_two - is a variable variable */
echo "\n\n$rate_two\n\n";
}


function whichRate (int $v): string {
    if($v = 1) {
        return '_one';
    }
    else if($v = 2) {
        return '_two';
    }
    else {
        return '_base';
    }
}






//