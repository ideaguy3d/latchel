<?php

//include 'oop/controllers/ControllerOne.php';
//include 'oop/models/ModelOne.php';

use oop\controllers\ControllerOne;
use oop\models\ModelOne;

echo "\n++waking up\n";

$bits = file_get_contents('controller-one.txt');

// I have to allow ControllerOne & ModelOne because ControllerOne uses ModelOne
$ctrl = unserialize($bits, ['allowed_classes' => [ControllerOne::class, ModelOne::class]]);

echo "\n\n_>> $ctrl->stats \n\n";

$debug = 1;