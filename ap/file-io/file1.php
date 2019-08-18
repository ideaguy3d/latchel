<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/17/2019
 * Time: 2:54 PM
 */


//pracReadFile1();
//pracWriteFile();

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
    $filename = 'prac2.csv';
    $dataStr = '1,2,3,4,5';
    file_put_contents('./rf/'.$filename, $dataStr);
    $handle = fopen("./rf/$filename", 'r');
    $result = fgetcsv($handle);
    echo gettype($result) . ', ';
    echo count($result);
}

//prac1();
function prac1 () {
    file_put_contents('./rf/data.csv', '1,2,3,4,5');
    $handle = fopen('./rf/data.csv', 'c+');
    $data = fgetcsv($handle, 0);
    var_dump($data[1]);
}

prac2();
function prac2 () {
    $f = './rf/data2.csv';
    file_put_contents($f, '1,2,3,4,5');
    $handle = fopen($f, 'c');
    fputcsv($handle, ['6','7','8']);
    fclose($handle);
    echo file_get_contents($f);
}












//