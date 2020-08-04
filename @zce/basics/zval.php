<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/4/2020
 * Time: 3:28 AM
 */

echo "\n\n";

function scalarZvalContainers () {
    $x = "perceptron";
    $y = &$x;
    xdebug_debug_zval('x');
    xdebug_debug_zval('y');
    unset($y);
    $y = 'cross validation';
    xdebug_debug_zval('x');
    xdebug_debug_zval('y');
    
    /*
        -- The zval containers --
        x: (refcount=2, is_ref=1)='perceptron'
        y: (refcount=2, is_ref=1)='perceptron'
        x: (refcount=1, is_ref=1)='perceptron'
        y: (interned, is_ref=0)='cross validation'
    */
}



$debug = 1;