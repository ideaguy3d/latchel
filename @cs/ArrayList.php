<?php
/**
 * Created by PhpStorm.
 * User: julius hernandez alvarado
 * Date: 6/5/2020
 * Time: 8:06 PM
 */

class ArrayList
{
    private array $array = [];
    
    public function __construct() {
    
    }
    
    public function mergeSort() {
        $this->array = $this->mergeSortRec($this->array);
    }
    
    private function mergeSortRec($array) {
        $length = count($array);
        
        if($length == 1) {
            $formatArray = var_export($array, true);
            echo $formatArray;
            return $array;
        }
        $mid = floor($length / 2);
        $left = array_slice($array, 0, $mid);
        $right = array_slice($array, $mid, $length - 1);
        $debug = 1;
        
        return $this->merge(
            $this->mergeSortRec($left), $this->mergeSortRec($right)
        );
    }
    
    private function merge(array $left, array $right) {
        $result = [];
        
        // start loops
        
        return $result;
    }
}