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
//basicOne();
namedGroups();

function getTabbingCount(array $tabbingInput, int $i): void {
    $notes = $tabbingInput[$i];
    
    echo "\n\n--------------------------------\n\n" . $notes;
    
    preg_match('/\d?\d?\w.*tab.*\w/i', $notes, $tabs);
    
    echo "\n\n $i) matches = " . ($tabs[0]);
    
    if(++$i === count($tabbingInput)) return;
    getTabbingCount($tabbingInput, $i);
}

function basicOne() {
    static $patterns = [
        // if there is a match, will only match 1 char
        '/[A-Z\d]/', '/[a-z\d]/',
        // match more than 1 char
        '/[A-Z\d]+/', '/[A-Z\d]{2}/', '/[A-Z\d]{1,}/', '/[A-Z\d]{2,4}/'
    ];
    $strings = ['abc123 ZYXxyz', 'XYZABC HELLO', 'hello world'];
    
    $pattern = array_shift($patterns);
    basicOneRecurse($pattern, $strings);
    
    if(count($patterns) > 0) return basicOne();
    return null;
}

function basicOneRecurse(string $pattern, array $strings) {
    $form = "\n" . 'pattern %s had %d matches in "%s" which were: %s';
    $string = array_shift($strings);
    preg_match($pattern, $string, $matches);
    preg_match_all($pattern, $string, $matchAll);
    $matchStr = implode('', array_map(fn($e) => " $e[0] ", $matches));
    printf($form, $pattern, count($matches), $string, $matchStr);
    if(count($strings) > 0) return basicOneRecurse($pattern, $strings);
    return null;
}

function namedGroups () {
    $subject = 'phpninja@mail.com';
    $pattern = '/(?<username>\w+)@(?<company>\w+)\.(?<tld>\w+)/';
    preg_match($pattern, $subject, $matches);
    echo var_export($matches, true);
}


//