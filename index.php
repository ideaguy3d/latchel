<?php
declare(strict_types=1);

require __DIR__ . '\vendor\autoload.php';

$homeCtrl = new \Latchel\HomeController();

// render the UI index
$homeCtrl->index();