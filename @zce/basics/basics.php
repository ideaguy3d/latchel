<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/2/2019
 * Time: 6:00 PM
 */

// float to int practice
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

function whichRate(int $v): string {
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

//__ array operators
echo "\n---- array unions: \n";
$a1 = ['product' => 'First class', 'price' => 0.55];
$a2 = ['product'=> 'Standard class', 'paper_type' => '60# white'];
echo var_export($a1 + $a2, true); // ['']
echo var_export($a2 + $a1, true);

$a1 = [1 => 'hi', '0' => 'world'];
$a2 = ['world', 'hi',];
echo "\n---- basic array comparison: \n";
echo json_encode($a1 == $a2), "\n"; // true
echo json_encode($a1 === $a2), "\n"; // false, despite $a1[1] and $a2[1] equaling 'hi'

// classes occupy their own memory space so they'll evaluate to false as well
$o1 = new class(){public string $prop = 'hi world';};
$o2 = clone $o1;
$a1 = [$o1,];
$a2 = [$o2];
echo "\n---- objects in array comparison: \n";
echo json_encode($a1 == $a2), "\n"; // true
echo json_encode($a1 === $a2), "\n"; // false

//__ Logical
$v1 = 1;
$v2 = 2;
echo "\n---- xor prac: \n";
if($v1 === 1 ^ $v2 === 2) {
    echo "\n both are true";
}
else {
    echo "\n but there are some cases this is not wanted\n";
}
if($v1 === 1 ^ $v2 === 1) {
    echo "\n This will get echoed";
}
else {
    echo "\n but not this";
}




$debug = 1;





//