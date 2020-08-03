<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/3/2020
 * Time: 2:39 PM
 */

printFormatted();

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
    if(count($formats) > 0) printFormatted();
}