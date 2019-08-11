<?php

namespace Latchel;

class Controller
{
    public function view($viewName, $data) {
        $render = require "\\templates\\$viewName.php";
        return '';
    }
}