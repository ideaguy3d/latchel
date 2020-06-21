<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 6/21/2020
 * Time: 1:43 PM
 *
 * @param array $set1
 *
 * @return array
 */
return function(array $set1): array {
    
    function mergeSort(array $set): ?array {
        $count = count($set);
        if(1 === $count) return $set;
        
        $mid = (int)floor($count/2);
        $left = array_slice($set, 0, $mid);
        $right = array_slice($set, $mid);
        
        return merge(mergeSort($left), mergeSort($right));
    }
    
    function merge(array $left, array $right): ?array {
        $sorted = [];
        $cL = count($left);
        $cR = count($right);
        $iL = 0;
        $iR = 0;
        
        while ($iL < $cL && $iR < $cR) {
            if($left[$iL] < $right[$iR]) {
                $sorted [] = $left[$iL++];
            }
            else {
                $sorted [] = $right[$iR++];
            }
        }
        
        while($iL < $cL) $sorted [] = $left[$iL++];
        while($iR < $cR) $sorted [] = $right[$iR++];
        
        return $sorted;
    }
    
    return mergeSort($set1);
};