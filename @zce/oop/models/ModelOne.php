<?php


namespace oop\models;


class ModelOne
{
    public function __construct() {
        echo "ModelOne is being constructed!";
    }
    
    public function update() {
        return 'UPDATE complete';
    }
}