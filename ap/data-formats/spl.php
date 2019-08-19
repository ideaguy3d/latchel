<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/19/2019
 * Time: 1:03 AM
 */


advancedFixedArrayPrac();

function advancedFixedArrayPrac() {
    $handle = fopen('H1B2016.csv', 'r');
    $headerRow = fgetcsv($handle, 0, ";");
    $fieldCount = count($headerRow);
    $count = 0;
    $row = null;
    $countF = null;
    //$fxArray = new SplFixedArray($fieldCount);

    while (!feof($handle)) {
        $row = fgetcsv($handle, 0, ";");
        $caseNumber = $row[1];
        $caseStatus = $row[2];

        if($count % 1000 === 0) {
            $countF = number_format($count);
            echo "\nrow $countF = case $caseNumber was $caseStatus\n";
        }

        $count++;
    }

    $totalCounts = number_format($count);
    echo "\n\nProgram Complete, scanned $totalCounts records\n\n";
    //$break = 'point';
    fclose($handle);
}


function basicFixedArrayPrac() {
    $fxArray = new SplFixedArray(5);

    $fxArray[1] = 2;
    $fxArray[4] = 'hi';

    foreach ($fxArray as $item) {
        echo "\n$item\n";
    }

    e();

    for ($i = 0; $i < count($fxArray); $i++) {
        $elem = $fxArray[$i];
        echo "\n$i - $elem\n";
    }
}


//-- Script Utility Functions:

function e() {
    echo "\n\n----\n\n";
}

//