<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/2/2020
 * Time: 11:12 PM
 */

edgeCase();

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

//