<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 6/7/2020
 * Time: 9:01 PM
 */

$set1 = [99, 19, 55, 0, 5, 8, 9, 5, 1, 2, 0, 5, 4, 4, 3, 99, 55];
echo var_export($set1, true);
$set1 = jMergeSort($set1);
echo "__>> The sorted array =  \n" . var_export($set1, true) . "\n";

function jMergeSort($set) {
    $setCount = count($set);
    if(1 === $setCount) {
        return $set;
    }
    
    // 1st divide the array
    $midPoint = floor($setCount / 2);
    $left = array_slice($set, 0, $midPoint);
    $right = array_slice($set, $midPoint);
    return jMerge(jMergeSort($left), jMergeSort($right));
}

function jMerge($left, $right): array {
    $sorted = [];
    $leftIndex = 0;
    $rightIndex = 0;
    $leftCount = count($left);
    $rightCount = count($right);
    
    // main sort loop
    while($leftIndex < $leftCount && $rightIndex < $rightCount) {
        if($left[$leftIndex] < $right[$rightIndex]) {
            $sorted [] = $left[$leftIndex++];
        }
        else {
            $sorted [] = $right[$rightIndex++];
        }
    }
    
    // clean up loops
    while($leftIndex < $leftCount) {
        $sorted [] = $left[$leftIndex++];
    }
    while($rightIndex < $rightCount) {
        $sorted [] = $right[$rightIndex++];
    }
    
    return $sorted;
}