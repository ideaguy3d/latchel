<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/17/2019
 * Time: 2:54 PM
 */


//pracReadFile1();
pracWriteFile();

/**
 * fopen(), fread(), feof()
 */
function pracReadFile1 () {
    $handle = fopen('./rf/ok-list.txt', 'r');
    while(!feof($handle)) {
        $v = fread($handle, 1024);
        echo "file value = $v";
        $break = 'point';
    }
    fclose($handle);
}

/**
 * file_put_contents(), fopen(), fgetcsv()
 */
function pracWriteFile () {
    $filename = 'prac.csv';
    $dataStr = '1,2,3,4,5';
    file_put_contents('./rf/'.$filename, $dataStr);
    $handle = fopen("./rf/$filename", 'r');
    $result = fgetcsv($handle);
    echo gettype($result) . ', ';
    echo count($result);
}






//