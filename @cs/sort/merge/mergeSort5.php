<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 6/16/2020
 * Time: 9:43 AM
 */
declare(strict_types=1);

return function(array $set) {
    /**
     * @param array $set
     *
     * @return array
     */
    function mergeSort(array $set): array {
        $count = count($set);
        
        if(1 === $count) return $set;
        
        $mid = (int)floor($count / 2);
        $left = array_slice($set, 0, $mid);
        $right = array_slice($set, $mid);
        
        return merge(mergeSort($left), mergeSort($right));
    }
    
    /**
     * @param array $left
     * @param array $right
     *
     * @return array
     */
    function merge(array $left, array $right): array {
        $sorted = [];
        $leftIndex = 0;
        $rightIndex = 0;
        $leftCount = count($left);
        $rightCount = count($right);
        
        while($leftIndex < $leftCount && $rightIndex < $rightCount) {
            if($left[$leftIndex] < $right[$rightIndex]) {
                $sorted [] = $left[$leftIndex++];
            }
            else {
                $sorted [] = $right[$rightIndex++];
            }
        }
        
        while($leftIndex < $leftCount) {
            $sorted [] = $left[$leftIndex++];
        }
        
        while($rightIndex < $rightCount) {
            $sorted [] = $right[$rightIndex++];
        }
        
        return $sorted;
    }
    
    // sort start
    return mergeSort($set);
};










//