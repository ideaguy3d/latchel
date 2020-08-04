<?php declare(strict_types=1);

class QuickSortOne
{
    public function quickSort(array $array) {
        $this->quick($array, 0, count($array) - 1);
    }
    
    private function quick($array, $left, $right) {
        $index = null;
        
        if(count($array) > 1) {
            $index = $this->partition($array, $left, $right);
            
            if($left < $index - 1) {
                $this->quick($array, $left, $index);
            }
            
            if($index < $right) {
                $this->quick($array, $index, $array);
            }
        }
    }
    
    private function partition(array $arr, int $left, int $right): int {
        $pivot = $arr[floor(($left + $right) / 2)];
        $i = $left;
        $j = $right;

     
        /*$set2 = [
            0 => 5,
            1 => 4,
            2 => 3,
            3 => 2,
            4 => 1,
            5 => 6
        ];*/
        while($i <= $j) {
            while($arr[$i] < $pivot) {
                $i++;
            }
            while($arr[$j] > $pivot) {
                $j--;
            }
            if($i <= $j) {
                $this->swapQuickSort($arr, $i, $j);
                $i++;
                $j--;
            }
        }
        
        return $i;
    }
    
    private function swapQuickSort($arr, $i, $j) {
    
    }
}