<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/9/2019
 * Time: 1:14 AM
 */

class IncorrectEnvelopeException extends Exception {}

function enterEnvelope() {
    $envelope = '#10 single window';
    if(strpos(strtolower($envelope), 'double') === false) {
        throw new IncorrectEnvelopeException('This job requires a double window');
    }
}
















//