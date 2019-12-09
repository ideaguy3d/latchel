<?php
/**
 *
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 7/20/2019
 * Time: 10:40 PM
 *
 */


$s = "some string";

// closure early binding
$early = function() use ($s) {
    echo $s;
};
$s = "\n early binding \n";
$early();

// closure late binding
$late = function() use (&$s) {
    echo $s;
};
$s = "\nlate binding\n";
$late();

$break = 'point';



//