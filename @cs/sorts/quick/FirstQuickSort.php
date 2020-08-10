<?php declare(strict_types=1);

class FirstQuickSort
{
    public array $arr;
    public int $arrCount;
    
    public function __construct(array $arr) {
        $this->arr = $arr;
        $this->arrCount = count($this->arr);
    }
    
    public function sort(): array {
        $this->quick(0, $this->arrCount - 1);
        return $this->arr;
    }
    
    /**
     * Recursive helper function
     *
     * @param $left - first index for partition
     * @param $right - last index for partition
     */
    private function quick($left, $right) {
        $index = null; // {1}:
        
        if($this->arrCount > 1) { // {2}:
            $index = $this->partition($left, $right); // {3}:
            
            if($left < $index - 1) $this->quick($left, $index -1); // {5}:
            if($index < $right) $this->quick($index, $right); // {7}:
        }
    }
    
    /**
     * do some work, then return the index
     *
     * @param int $left - left pointer
     * @param int $right - right pointer
     *
     * @return int
     */
    private function partition(int $left, int $right): int {
        $pivot = $this->arr[floor(($left + $right) / 2)];
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
            while($this->arr[$i] < $pivot) $i++; // {12}: shift the left pointer until we find an item that is GREATER than pivot
            while($this->arr[$j] > $pivot) $j--; // {13}: shift the right pointer until we find an item that is LESS than the pivot
            
            if($i <= $j) { // {14}: now compare whether the "left pointer index" is <= the "right pointer index" meaning the left item "$this->arr[$i]" is <= the right item "$this->arr[$j]"
                $this->swap($i, $j); // {15}: swap them, shift pointers, repeat process"goto {11}:"
                ++$i && --$j; // I wonder if this makes no difference or slows down or speeds up the script 🤔 ?
            }
        }
        
        // b
        return $i; // {16}: return the "left pointer index" to create sub-arrays @{3}:
    }
    
    /**
     * @param int $idx1
     * @param int $idx2
     */
    private function swap(int $idx1, int $idx2): void {
        $aux = $this->arr[$idx1];
        $this->arr[$idx1] = $this->arr[$idx2];
        $this->arr[$idx2] = $aux;
        
        // test this
        //[$this->arr[$idx1], $this->arr[$idx2]] = [$this->arr[$idx2], $this->arr[$idx1]];
    }
}