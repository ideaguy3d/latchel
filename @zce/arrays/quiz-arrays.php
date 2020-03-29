<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 3/19/2020
 * Time: 12:49 AM
 *
 * 6 questions
 * 1) 6
 * 2) 4
 * 3) 2
 * 4) B
 * 5) B
 * 6) A
 */

$a = ["1" => "A", 1 => "B", "C", 2 => "D"];
echo count($a);

$a2 = [
    [1, 2],
    'a' => ['b' => 1, "c"]
];

echo "\na:";
echo $a2[5][2];
echo "\nb: ";
echo $a2[5][2] = 2;

echo "\n\n";




//