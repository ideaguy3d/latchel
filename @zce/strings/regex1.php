<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 2/16/2020
 * Time: 5:20 PM
 */

namespace zce\strings\julius;

$strInput = require 'strInput.php';

//getTabbingCount($strInput, 0);
basicOne();

function getTabbingCount(array $tabbingInput, int $i): void {
    $notes = $tabbingInput[$i];

    echo "\n\n--------------------------------\n\n" . $notes;

    preg_match('/\d?\d?\w.*tab.*\w/i', $notes, $tabs);

    echo "\n\n $i) matches = " . ($tabs[0]);

    if (++$i === count($tabbingInput)) return;
    getTabbingCount($tabbingInput, $i);
}

function basicOne () {
    // if there is a match, will only match 1 char
    static $patterns = ['/[A-Z\d]/', '/[a-z\d]/'];
    $strings = ['abc123 ZYXxyz', 'XYZABC', 'hello world'];
    
    $pattern = array_shift($patterns);
    basicOneRecurse($pattern, $strings);
    
    if(count($patterns) > 0) return basicOne();
    return null;
}

function basicOneRecurse (string $pattern, array $strings) {
    $string = array_shift($strings);
    preg_match($pattern, $string, $matches, PREG_OFFSET_CAPTURE);
    if(count($strings) > 0) return basicOneRecurse($pattern, $strings);
    return null;
}


//