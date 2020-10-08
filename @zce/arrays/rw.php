<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/10/2020
 * Time: 3:50 AM
 */

$x = ['hi', [1,2]];
$x[5][2] = 'world';
var_dump($x);
var_dump(array_keys($x));
echo 'matrix x34 = ' . $x[3][4];

