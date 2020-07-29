<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 7/29/2020
 * Time: 2:57 PM
 */

class OneMagic
{
    private string $cluster;
    private array $dynamicHash = [];
    
    public function __set($name, $value) {
        $this->dynamicHash[$name] = $value;
    }
    
    public function __get($name) {
        return isset($this->dynamicHash[$name]) ?: 'Value does not exist';
    }
    
    public function getDynamicHash(): string {
        $keys = array_keys($this->dynamicHash);
        return $this->formatDynamicHash($keys);
    }
    
    private function formatDynamicHash(array $keys): string {
        static $format = '';
        $key = $keys[0];
        $format .= "$key = {$this->dynamicHash[$key]}, ";
        
        // how expensive is array_shift() ???
        array_shift($keys);
        if(!empty($keys)) return $this->formatDynamicHash($keys);
        
        // the recursion will continue to this point at some recurse point
        $continuedState = true;
        
        return substr($format, 0, -1);
    }
}

$one = new OneMagic;

$one->metric = 'regression';
$one->clusterType = 'exponential';

echo "\n\n" . $one->getDynamicHash();

$debug = 1;