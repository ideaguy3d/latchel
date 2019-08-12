<?php
declare(strict_types=1);

namespace Latchel;

use Closure;

class Controller
{
    public function view(string $viewName, string $appName, array $data = null) {
        $render = require "templates/$viewName.php";
        return $render($appName, $data);
    }
}