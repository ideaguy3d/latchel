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

//-- "Return by Reference" practice,
// (these are more useful in classes):
function &refPrac(string $status): string {
    global $n;
    $cep = "[ bar_$status ]";
     echo "$n refPrac() cep = $cep $n";
    return $cep;
}

//$someValue = &refPrac('hello');

function &token () {
    $arr = ['metric' => 'classification', 'train' => 'nuero'];
    return $arr;
}
$redu = ['math' => 'linear', 'form' => 'chain'];
//$nize = &token();
$redu['math'] = 'differential';
$nize['train'] = 'ceptron';
//token();

// return by reference prac2
class DataRef
{
    private string $dsn = 'hi';

    public function &dsnRef(): string {
        $this->dsn = "bar0101j_ $this->dsn _";
        return $this->dsn;
    }

    public function setDsn(string $v): void {
        $this->dsn = $v;
        $this->dsnRef();
    }
}

$ref = new DataRef();
$someValue2 = &$ref->dsnRef();
$ref->setDsn('bye');

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
$bar->dsn = 'bye';

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