<?php


function mergeSort(array $set): array {
    $count = count($set);
    if(1 === $count) return $set;
    $mid = (int)floor($count / 2);
    $left = array_slice($set, 0, $mid);
    $right = array_slice($set, $mid);
    return merge(mergeSort($left), mergeSort($right));
}

function merge(array $left, array $right): array {
    $sorted = [];
    $rIndex = 0;
    $rCount = count($right);
    $lIndex = 0;
    $lCount = count($left);
    while($lIndex < $lCount && $rIndex < $rCount) {
        if($left[$lIndex] < $right[$rIndex]) {
            $sorted [] = $left[$lIndex++];
        }
        else {
            $sorted [] = $right[$rIndex++];
        }
    }
    
    while($lIndex < $lCount) {
        $sorted [] = $left[$lIndex++];
    }
    
    while($rIndex < $rCount) {
        $sorted [] = $right[$rIndex++];
    }
    
    return $sorted;
}


// end of file