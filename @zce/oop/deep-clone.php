<?php

include 'oop/controllers/ControllerOne.php';
include 'oop/models/ModelOne.php';

use oop\controllers\ControllerOne;

$ctrl = new ControllerOne();
echo $ctrl->auth();

// shallow clone
$clonedCtrl = clone $ctrl;

// deep clone
$ctrl->doDeepClone = true;
$ctrlClone2 = clone $ctrl;

$debug = 1;