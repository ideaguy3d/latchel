<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/17/2019
 * Time: 3:34 PM
 */

e();

practiceOne();

e();
//$someNum = fatalErrorPrac(2,4);
//echo "some num = $someNum ", gettype($someNum);


function e() {
    echo "\n\n----\n\n";
}

function practiceOne() {
    // try to fully grok variable functions
    $lambdaOne = function (int $x): string {
        return ($x * 0.5) . ' to ' . ($x * 1.5);
    };

    echo gettype($lambdaOne), ' | type $lambdaOne(2400) = ' . gettype($lambdaOne(2400));
    echo "\n\n lambdaOne class = " . get_class($lambdaOne);
    echo "\n\n hours to learn = " . $lambdaOne(2400);
}

class Animal
{
    protected $nature;

    public function getValue() {
        $boundVar = 'Animal';
        return function (string $name) use ($boundVar) {
            return "$name is a " . $this->nature . ' ' . $boundVar;
        };
    }
}

class Dog extends Animal
{
    protected $nature = 'happy';
}

class Cat extends Animal
{
    protected $nature = 'cute';
}

e();

$cat = new Cat;
$dog = new Dog;

$animNature = $cat->getValue();
echo $animNature('max');
e();
$animNature = $animNature->bindTo($dog);
echo $animNature('skipper');

e();

function fatalErrorPrac(?float $x, ?float $y): float {
    return (double)$x * (double)$y;
}

$someF = function () {
    echo 'hello there';
};

if (!is_callable($someF)) {
    function sayHello() {
        echo "Hello ^_^/";
    }
}
else {
    function sayHello() {
        echo "I was never defined :'(";
    }
}

// sayHello only gets defined if a condition is met
sayHello();

paramTypes(1);
paramTypes(1, 2);
paramTypes(1, 2, 3);
paramTypes(1, 2, 3, 4);
paramTypes(1, 2, 3, 4, 5);

// variadic prac
function paramTypes(int $req, int $opt = null, ...$vari): void {
    echo "\n";
    printf(
        'Required: %d, Optional: %d, Variadic length: %d' . "\n",
        $req, $opt, count($vari)
    );

    foreach ($vari as $v) {
        echo "$v\n";
    }

}


$break = 'point';