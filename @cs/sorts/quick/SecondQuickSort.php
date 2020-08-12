<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/10/2020
 * Time: 12:35 PM
 */


namespace compSciPractice;


class SecondQuickSort
{
    public array $arr;
    public int $arrCount;
    
    public function __construct(array $arr) {
        $this->arr = $arr;
        $this->arrCount = count($arr);
    }
    
    public function sort(): array {
        $this->quick(0, $this->arrCount - 1);
        return $this->arr;
    }
    
    private function quick(int $lPtr, int $rPtr) {
        // index is a pointer between the left&right pointers
        $index = $this->partition($lPtr, $rPtr);
        if($lPtr < $index - 1) $this->quick($lPtr, $index - 1);
        if($index < $rPtr) $this->quick($index, $rPtr);
    }
    
    private function partition($lPtr, $rPtr): int {
        $pivot = $this->arr[floor(($lPtr + $rPtr) / 2)];
        
        while($lPtr <= $rPtr) {
            while($this->arr[$lPtr] < $pivot) $lPtr++;
            while($this->arr[$rPtr] > $pivot) $rPtr--;
            
            
            //if($lPtr <= $rPtr) $this->swap($lPtr, $rPtr) && ++$lPtr && --$rPtr; // also works
            if($lPtr <= $rPtr) $this->swap($lPtr++, $rPtr--);
        }
        
        return $lPtr;
    }
    
    
    private function swap(int $lPtr, int $rPtr): bool {
        [$this->arr[$lPtr], $this->arr[$rPtr]] = [$this->arr[$rPtr], $this->arr[$lPtr]];
        return true;
    }
}