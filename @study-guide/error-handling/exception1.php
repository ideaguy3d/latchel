<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/9/2019
 * Time: 1:14 AM
 */

class IncorrectEnvelopeException extends Exception {}

alpha();

function alpha () {
    try {
        beta();
    }
    catch (Exception $e) {
        $method = __METHOD__;
        $message = $e->getMessage();
        echo "\n__>> Exception $message caught in ~$method\n";
    }
}

function beta () {
    $x = 0;
    try {
        com($x);
    }
    catch (Throwable $e) {
        $method = __METHOD__;
        $message = $e->getMessage();
        echo "\n__>> Exception $message caught in ~$method\n";
    }
}

/**
 * @param $x float
 * @return float|int
 * @throws Exception
 */
function com ($x) {
    if($x === 0) {
        throw new Exception('|No division by 0|');
    }
    return (1 / $x);
}

/**
 * @throws IncorrectEnvelopeException
 */
function enterEnvelope() {
    $envelope = '#10 single window';
    if(strpos(strtolower($envelope), 'double') === false) {
        $info = 'This job requires a double window';
        throw new IncorrectEnvelopeException($info);
    }
}
















//