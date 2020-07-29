<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 6/13/2020
 * Time: 2:09 PM
 */

$mergeSort = new class() {
    /**
     * pass in set by-value, but for mergeSort5 pass it in by-reference
     *
     * @param array $set
     *
     * @return array
     */
    public function sort(array $set): array {
        $count = count($set);
        
        if(1 === $count) return $set;
        
        $mid = (int)floor($count / 2);
        $left = array_slice($set, 0, $mid);
        $right = array_slice($set, $mid);
        
        return $this->merge($this->sort($left), $this->sort($right));
    }
    
    private function merge(array $left, array $right): array {
        $sorted = [];
        $leftIndex = 0;
        $rightIndex = 0;
        $leftCount = count($left);
        $rightCount = count($right);
        
        while($leftIndex < $leftCount && $rightIndex < $rightCount) {
            if($left[$leftIndex] < $right[$rightIndex]) {
                $sorted  [] = $left[$leftIndex++];
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
};

$set1 = [11, 7, 15, 5, 3, 9, 8, 10, 13, 12, 14, 20, 18, 25, 6];

$set1 = $mergeSort->sort($set1);
$set1export = var_export($set1, true);

echo "\n\n $set1export \n\n";












//