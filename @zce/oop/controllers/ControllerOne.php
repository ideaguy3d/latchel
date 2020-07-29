<?php

namespace oop\controllers;

use oop\models\ModelOne;

class ControllerOne
{
    public ModelOne $model;
    public string $stats = 'PHP Statistical Computing';
    public bool $doDeepClone = false;
    
    public function __construct() {
        echo "ControllerOne constructor";
        $this->model = new ModelOne('classification');
    }
    
    public function auth() {
        return 'User is authenticated';
    }
    
    public function __clone() {
        echo "\n\n_> cloning ControllerOne \n\n";
        if($this->doDeepClone) {
            $this->model = new ModelOne('linear');
        }
    }
}