<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 7/30/2020
 * Time: 12:10 PM
 */

class OneQuick
{
    public string $stat = 'one';
    
    public function __serialize(): array {
        $this->stat = 'two';
        
        // Must return an array
        return ['stat' => $this->stat];
    }
    
    public function __unserialize(array $data) {
        $this->stat = $data['stat'];
    }
}

$obj = unserialize(serialize(new OneQuick()));

$debug = 1;