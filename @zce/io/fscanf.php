<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/2/2020
 * Time: 2:54 PM
 */
 
$stream = fopen('file-io/acc-sales.csv', 'r');

$f = "%4d,%2d,%03d,%6d,%10f,%20s %20s\r\n";

$header_row = fgets($stream);
$row = fscanf($stream, $f);
[$_year, $_weekNum, $_totalJobsSold, $_invoice, 
    $_totalSalesAmount, $_first, $_last] = $row;
    
$debug = 1;