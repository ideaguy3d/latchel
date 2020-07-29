<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 3/8/2020
 * Time: 3:33 PM
 */

include 'oop/controllers/ControllerOne.php';
include 'oop/models/ModelOne.php';

use oop\controllers\ControllerOne;
use oop\models\ModelOne;

$ctrl = new ControllerOne();

//, ['allowed_classes' => ControllerOne::class]
$bits = serialize($ctrl);
file_put_contents('controller-one.txt', $bits);
unset($ctrl);

echo "\n-- going to sleep\n";
sleep(2);