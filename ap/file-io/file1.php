<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/17/2019
 * Time: 2:54 PM
 */


pracReadFile1();

function pracReadFile1 () {
    $handle = fopen('./file.txt', 'r');
    while(!feof($handle)) {
        $v = fread($handle, 1024);
        echo "file value = $v";
        $break = 'point';
    }
    fclose($handle);
}






//