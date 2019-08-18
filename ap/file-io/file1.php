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
function pracReadFile1() {
    $handle = fopen('./rf/ok-list.txt', 'r');
    while (!feof($handle)) {
        $v = fread($handle, 1024);
        echo "file value = $v";
        $break = 'point';
    }
    fclose($handle);
}

/**
 * file_put_contents(), fopen(), fgetcsv()
 */
function pracWriteFile() {
    $filename = 'prac2.csv';
    $dataStr = '1,2,3,4,5';
    file_put_contents('./rf/' . $filename, $dataStr);
    $handle = fopen("./rf/$filename", 'r');
    $result = fgetcsv($handle);
    echo gettype($result) . ', ';
    echo count($result);
}

echo "\n\n----\n\n";

// chp.8 quiz questions:

prac1();
function prac1() {
    file_put_contents('./rf/data.csv', '1,2,3,4,5');
    $handle = fopen('./rf/data.csv', 'c+');
    $data = fgetcsv($handle, 2);
    var_dump($data[1]);
}

echo "\n\n----\n\n";

prac2();
/**
 * file_put_contents(), fopen(), fputcsv(), file_get_contents()
 */
function prac2() {
    $f = './rf/data2.csv';
    file_put_contents($f, '1,2,3,4,5');
    $handle = fopen($f, 'c');
    fputcsv($handle, ['6', '7', '8']);
    fclose($handle);
    echo file_get_contents($f);
}

echo "\n\n----\n\n";

prac3();
function prac3() {
    $url = "http://localhost/img/robot.jpg";
    file_put_contents('robot.jpg', file_get_contents($url));
    if (!rename('robot.jpg', 'robot.png')) {
        throw new \http\Exception\RuntimeException('__>> could not convert jpg to a png');
    }
    $fileInfo = new finfo();
    echo $fileInfo->file('robot.png') . PHP_EOL;
}












//