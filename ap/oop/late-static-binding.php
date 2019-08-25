<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/24/2019
 * Time: 6:48 PM
 */


class Alpha
{
    public static function foo() {
        static::who();
    }

    public static function who() {
        echo "Alpha";
    }
}

class Bravo extends Alpha
{
    public static function test() {
        Alpha::foo();
        parent::foo();
        self::foo();
    }
}

class Comm extends Bravo
{
    public static function who() {
        echo '_Comm';
    }
}

echo "\n\n----\n\n";

Comm::test();

echo "\n\n----\n\n";


//