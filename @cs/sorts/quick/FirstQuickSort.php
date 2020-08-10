<?php declare(strict_types=1);

class FirstQuickSort
{
    public function sort(array $array) {
        $this->quick($array, 0, count($array) - 1);
    }
    
    /**
     * Recursive helper function
     *
     * @param $array
     * @param $left     - first index for partition
     * @param $right    - last index for partition
     */
    private function quick($array, $left, $right) {
        $index = null; // {1}:
        
        if(count($array) > 1) { // {2}:
            $index = $this->partition($array, $left, $right); // {3}:
            
            if($left < $index - 1) { // {4}:
                $this->quick($array, $left, $index); // {5}:
            }
            
            if($index < $right) { // {6}:
                $this->quick($array, $index, $array); // {7}:
            }
        }
    }
    
    /**
     * do some work, then return the index
     *
     * @param array $arr
     * @param int $left     - left pointer
     * @param int $right    - right pointer
     *
     * @return int
     */
    private function partition(array $arr, int $left, int $right): int {
        $pivot = $arr[floor(($left + $right) / 2)];
        $i = $left; // left pointer
        $j = $right; // right pointer
        
        
        /*
            $set2 = [
                0 => 5,
                1 => 4,
                2 => 3,
                3 => 2,
                4 => 1,
                5 => 6
            ];
        */
        
        // b
        while($i <= $j) { // {11}: while left pointer doesn't cross right pointer, execute the partition process
            while($arr[$i] < $pivot) $i++; // {12}: shift the left pointer until we find an item that is GREATER than pivot
            while($arr[$j] > $pivot) $j--; // {13}: shift the right pointer until we find an item that is LESS than the pivot
            
            if($i <= $j) { // {14}: now compare whether the "left pointer index" is <= the "right pointer index" meaning the left item "$arr[$i]" is <= the right item "$arr[$j]"
                $this->swap($arr, $i, $j); // {15}: swap them, shift pointers, repeat process"goto {11}:"
                $i++;
                $j--;
            }
        }
        
        // b
        return $i; // {16}: return the "left pointer index" to create sub-arrays @{3}:
    }
    
    /**
     * @param array $arr - pass by ref
     * @param int $idx1
     * @param int $idx2
     */
    private function swap(array &$arr, int $idx1, int $idx2): void {
        $aux = $arr[$idx1];
        $arr[$idx1] = $arr[$idx2];
        $arr[$idx2] = $aux;
    }
}