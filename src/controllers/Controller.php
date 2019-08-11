<?php

namespace Latchel;

use Closure;

class Controller
{
    public function view(string $viewName, string $appName, array $data = null): Closure {
        $render = require "templates/$viewName.php";
        return $render($appName, $data);
    }
}