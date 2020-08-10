<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/10/2020
 * Time: 12:35 PM
 */


namespace julius;


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
        $index = $this->partition($lPtr, $rPtr);
        if($lPtr < $index - 1) $this->quick($lPtr, $index - 1);
        if($index < $rPtr) $this->quick($index, $rPtr);
    }
    
    private function partition($lPtr, $rPtr): int {
        $pivot = $this->arr[floor(($lPtr + $rPtr) / 2)];
        
        // $this->arr[idx] GET USED SOMEWHERE !!!
        while($lPtr > $rPtr) {
            while($lPtr < $pivot) $lPtr++;
            while($rPtr > $pivot) $rPtr--;
            
            if($lPtr <= $rPtr) $this->swap($lPtr, $rPtr) && ++$lPtr && --$rPtr;
        }
        
        return $lPtr;
    }
    
    
    private function swap(int $lPtr, int $rPtr): void {
        [$this->arr[$lPtr], $this->arr[$rPtr]] = [$this->arr[$rPtr], $this->arr[$lPtr]];
        $debug = 1;
    }
}