<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/19/2019
 * Time: 1:03 AM
 */

$fxArray = new SplFixedArray(5);

$fxArray[1] = 2;
$fxArray[4] = 'hi';

foreach ($fxArray as $item) {
    echo "\n$item\n";
}

e();

for($i = 0; $i < count($fxArray); $i++) {
    $elem = $fxArray[$i];
    echo "\n$i - $elem\n";
}






function e() {
    echo "\n\n----\n\n";
}

//