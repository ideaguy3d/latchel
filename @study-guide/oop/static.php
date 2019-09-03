<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/17/2019
 * Time: 3:34 PM
 */

class Delta
{
    public static function ello() {
        echo "Ello World ^_^/" . PHP_EOL;
    }

    public function say() {
        echo "\n\nWell, let me start off by saying, ";
        self::ello();
    }
}

$delta = new Delta();

echo "\n----\n";

Delta::ello();

$delta->say();













//