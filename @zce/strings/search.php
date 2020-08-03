<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/2/2020
 * Time: 11:12 PM
 *
 * strspn(), strcspn(), substr_count()
 */

$strInput = require 'strInput.php';
// have to include space
$searchFor = ['tabber', ' tab ', ' tabs '];

//edgeCase();
//countSubStrings($searchFor, $strInput);
//stringSpan();


function edgeCase() {
    $input = 'apple';
    $letter = 'a';
    $found = fn() => "\nLetter '$letter' found\n";
    $notFound = fn() => "\nDid NOT find letter '$letter'\n";
    
    // false will get cast to int 0
    echo strpos($input, $letter) == false ? $notFound() : $found();
    
    // no casting will take place
    echo false === strpos($input, $letter) ? $notFound() : $found();
}

function countSubStrings(array $searchTerms, array $strInput): void {
    static $r = '';
    $searchTerm = array_shift($searchTerms);
    recurseOver($strInput, $searchTerm, $r);
    
    if(!empty($searchTerms)) countSubStrings($searchTerms, $strInput);
    echo $r;
}

function recurseOver(array $set, string $searchTerm, string &$r): void {
    // search 2 elements at a time
    $elem = strtolower(array_shift($set));
    $elem2 = strtolower(array_shift($set));
    $searchCount = substr_count($elem, $searchTerm);
    if(null !== $elem2) $searchCount2 = substr_count($elem2, $searchTerm);
    
    if(!empty($set)) recurseOver($set, $searchTerm, $r);
    
    $r .= "\n_> searched for: $searchTerm, found: $searchCount\n";
    if(null !== $elem2 && isset($searchCount2))
        $r .= "\n_> searched for: $searchTerm, found: $searchCount2\n";
}

function stringSpan() {
    // 2
    $subject = '99 is the answer to the 128th question';
    // 0
    $subject2 = 'num 4543212 is the answer to the 128th question';
    $mask = '123456789';
    
    $v = strspn($subject, $mask);
    $v2 = strspn($subject2, $mask, 4);
    $u = strcspn($subject2, $mask); // 4
    $debug = 1;
}



//