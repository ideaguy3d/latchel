<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/4/2020
 * Time: 6:24 PM
 */
 
chdir('oop/data');


$dataStream = streamData();

foreach($dataStream as $data) {
    $dataExport = var_export($data, true);
    echo "\n_> $dataExport\n";
}



function streamData () {
    $stream = fopen('acc-sales.csv', 'r+');
    while(!feof($stream)) yield fgetcsv($stream);
    fclose($stream);
}

