<?php


namespace oop\models;


class ModelOne
{
    public string $modelType;
    public string $mode = 'quick';
    public int $reduceTo = 2;
    
    public function __construct($regression) {
        echo "ModelOne is being constructed!";
        $this->modelType = $regression;
    }
    
    public function update() {
        return 'UPDATE complete';
    }
}