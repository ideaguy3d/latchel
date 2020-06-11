<?php
/**
 * Created by PhpStorm.
 * User: julius hernandez alvarado
 * Date: 6/11/2020
 * Time: 2:16 PM
 */

$set1 = [11, 7, 15, 5, 3, 9, 8, 10, 15, 13, 12, 14, 20, 18,18, 25, 6];

echo "\n\n" . var_export(mergeSort($set1), true) . "\n\n";

function mergeSort(array $set): array {
    $count = count($set);
    
    if(1 === $count) {
        return $set;
    }
    
    // rem, floor() returns a float
    $mid = (int)floor($count / 2);
    $left = array_slice($set, 0, $mid);
    $right = array_slice($set, $mid);
    
    return merge(mergeSort($left), mergeSort($right));
}

function merge(array $left, array $right): array {
    $sorted = [];
    $leftIdx = 0;
    $rightIdx = 0;
    $leftCount = count($left);
    $rightCount = count($right);
    
    while($leftIdx < $leftCount && $rightIdx < $rightCount) {
        if($left[$leftIdx] < $right[$rightIdx]) {
            $sorted [] = $left[$leftIdx++];
        }
        else {
            $sorted [] = $right[$rightIdx++];
        }
    }
    
    while($leftIdx < $leftCount) {
        $sorted [] = $left[$leftIdx++];
    }
    
    while($rightIdx < $rightCount) {
        $sorted [] = $right[$rightIdx++];
    }
    
    return $sorted;
}







//