<?php


namespace oop\controllers;


class ControllerOne
{
    public function __construct() {
        echo "ControllerOne constructor";
    }
    
    public function auth() {
        return 'User is authenticated';
    }
}