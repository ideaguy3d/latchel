<?php

require __DIR__ . '\vendor\autoload.php';

$homeCtrl = new \Latchel\HomeController();
/**
 * @var array
 */
$index = $homeCtrl->index(); // why?!?

$app = 'app';

//$homeCtrl->getPosts()
$posts = [];

$render = require 'templates/template.php';
$render($app, $posts);

$break = 'point';
