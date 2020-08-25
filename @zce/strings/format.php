<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/3/2020
 * Time: 2:39 PM
 * %[Argnum$][Flags][Width][.Precision]Specifier
 *
 **** Conversion Specification ****
 * Argnum       -  %2$s  param2, Spec.str
 ** Flag        -  + 0'-
 * Width        -  int specifying MIN num chars for result conversion
 * Precision    -  f,F,e,E precision. For s a cutoff point
 ** Specifier   -  %,s,d,b,c
 *
 **** Functions that use "Conversion Specification" ****
 * sscanf() -
 * sprintf()
 * vsprintf()
 * printf()
 * vprintf()
 **/


//printFormatted();
echo "\n--\n";
formatOne();

function printFormatted() {
    static $formats = [
        "\n" . 'There are %u hours in a %s usually' . "\n", // unsigned decimal
        "\n" . 'There are %d hours in a %s usually' . "\n", // decimal
        "\n" . 'There are %c hours in a %s usually' . "\n", // ASCII
        "\n" . 'There are %b hours in a %s usually' . "\n", // binary
        "\n" . 'There are %x hours in a %s usually' . "\n", // hexadecimal
    ];
    
    $format = array_splice($formats, 0, 1)[0];
    printf($format, 24, 'day');
    if(count($formats) > 0) return printFormatted();
    return null;
}

function formatOne() {
    $num = 5;
    $loc = 'tree';
    $anim = 'gorilla';
    
    $f = 'The %2$s contains %1$d %3$s\'s.
    Wow, how many %2$s\'s did that %3$s climb?';
    $s1 = sprintf($f, $num, $loc, $anim);
    $s2 = sprintf("%'.8d\n", 1010);
    $s3 = sprintf("%'08d\n", 1001);
    $s4 = sprintf('%08d', 1001); // s3 & s4 are the same
    
    $x = 19.99;
    $y = -19.44;
    $z = $x + $y;
    $s5 = sprintf('$%01.2f', $z);
    
    $debug = 1;
}
