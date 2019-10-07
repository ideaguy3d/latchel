<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 10/6/2019
 * Time: 11:29 PM
 */


/**
 * basic generator prac
 *
 * @param int $c
 * @return Generator
 */
function genOne (int $c): \Generator {
    for ($i = 0; $i < $c; $i++) {
         yield $i;
    }
}

$x = 0;
foreach (genOne(10) as $item) {
    $x += $item;
    echo "\n $item";
}










//