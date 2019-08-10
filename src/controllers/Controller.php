<?php

namespace Latchel;

class Controller
{
    public function view($viewName, $data) {
        $render = require '/templates' . DIRECTORY_SEPARATOR . $viewName . '.php';
        return '';
    }
}