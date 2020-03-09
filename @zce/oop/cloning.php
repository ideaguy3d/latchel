<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 3/8/2020
 * Time: 4:40 PM
 */

class SomeObject
{
    static $instances = 0;
    public $o_instance;

    public function __construct() {
        $this->o_instance = ++self::$instances;
    }

    public function __clone() {
        $this->o_instance = ++self::$instances;
    }
}

class SomeClone
{
    public $obj1;
    public $obj2;

    public function __clone() {
        $this->obj1 = clone $this->obj1;
    }
}

$obj = new SomeClone();

$obj->obj1 = new SomeObject();
$obj->obj2 = new SomeObject();

$object2 = clone $obj;

print("\n\n_> original object:\n");
print_r($obj);

print("\n\n_> cloned object:\n");
print_r($object2);

$debug = 1;


// end of file