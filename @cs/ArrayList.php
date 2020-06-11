<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: julius hernandez alvarado
 * Date: 6/5/2020
 * Time: 8:06 PM
 */

namespace julius;

class ArrayList
{
    private array $array = [];
    
    public function __construct($array) {
        $this->array = $array;
    }
    
    public function getArray() {
        return $this->array;
    }
    
    public function mergeSort(): array {
        $this->array = $this->mergeSortRec($this->array);
        return $this->array;
    }
    
    private function mergeSortRec($array): array {
        $length = count($array);
        
        if($length === 1) {
            echo var_export($array, true) . "\n\n";
            return $array;
        }
        $mid = floor($length / 2);
        $left = array_slice($array, 0, $mid);
        $right = array_slice($array, $mid); // $length - 1
        $debug = 1;
        
        return $this->merge($this->mergeSortRec($left), $this->mergeSortRec($right));
    }
    
    private function merge(array $left, array $right): array {
        $result = [];
        $idxR = 0;
        $idxL = 0;
        $countR = count($right);
        $countL = count($left);
        
        // the main sort
        while($idxL < $countL && $idxR < $countR) {
            if($left[$idxL] < $right[$idxR]) {
                $result [] = $left[$idxL++];
            }
            else {
                $result [] = $right[$idxR++];
            }
        }
        
        // clean up loops
        while($idxL < $countL) {
            $result [] = $left[$idxL++];
        }
        while($idxR < $countR) {
            $result [] = $right[$idxR++];
        }
        
        echo "_> Merge result: ", var_export($result, true);
        
        return $result;
    }
}