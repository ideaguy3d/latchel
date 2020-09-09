<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/3/2020
 * Time: 11:05 PM
 */
 
chdir('file-io');

$w19_sales_handle = fopen('week19_sales.txt', 'a');
fwrite($w19_sales_handle, "r\n.r\n.all_sales_reps: $9,217.29\r\nregion: Sacramento Metropolitan");
fclose($w19_sales_handle);

// intentional errors:
$handle = fopen('week19_sales.txt', 'r');
$r = fwrite($handle, "adding Denver metropolitan area\r\n");

$debug = 1;