<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 10/13/2019
 * Time: 12:35 AM
 */

$n = "\n\n";

//-- "Variable Functions" prac:
$i = 2;
function com() {
    echo "\n\n Windows COM \n\n";
}

$foo = 'com';
$foo();


//-- "Return by Reference" prac,
// (these are more useful in classes):
function &refPrac(string $status): string {
    global $n;
    $foo = "$n bar_$status $n";
    echo "$n refPrac() $n";
    return $foo;
}

$someValue = &refPrac('hello');
echo $someValue;
refPrac('world');
echo $someValue;

// return by reference prac2
class SomeRef
{
    private $dsn = 'hi';

    function &refPrac2(): string {
        global $n;
        $dsn = $this->dsn;
        $r = rand(0, 10000);
        $this->dsn = "{$n}bar0101{$r}j:$dsn $n";
        return $this->dsn;
    }

    function setDsn(string $v): void {
        $this->dsn = $v;
        $this->refPrac2();
    }
}

$ref = new SomeRef();
$someValue2 = &$ref->refPrac2();
echo $someValue2;
$ref->setDsn('bye');
echo $someValue2;

// return by reference prac3
class fooRef
{
    public $dsn = 'hi';

    function &getDsn() {
        return $this->dsn;
    }
}

$bar = new fooRef;
$baz = &$bar->getDsn();
echo $baz; // hi
$bar->dsn = 'bye';

echo "$n $baz $n"; // bye


//-- Lambda prac:
$lambda = function (int $a, int $b): int {
    return $a + $b;
};

gettype($lambda); // "object"
gettype($lambda(1, 2)); // "int"

//-- "Binding Closures to Scope" prac:
class bindClosure
{
    protected $someProp;

    function getClosure() {
        $boundVar = '_bound Var';

        return function () use ($boundVar) {
            return $this->someProp . $boundVar;
        };
    }
}

class alphaBind extends bindClosure
{
    protected $someProp = 'alpha class';
}

class omicronBind extends bindClosure
{
    protected $someProp = 'omicron class';
}

$bind = new alphaBind();
$closure = $bind->getClosure();
echo $closure() . $n; // alpha... _bound...

$closure = $closure->bindTo(new omicronBind());
echo $closure() . $n; // omicron... _bound...



// END OF FILE