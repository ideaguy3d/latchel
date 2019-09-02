<?php
declare(strict_types=1);

require __DIR__ . '\vendor\autoload.php';


//-----------------------------------------
//---------- _Application_Start_ ----------
//-----------------------------------------
$renderLatchel = false;


if($renderLatchel) {
    renderLatchel();
}
else {
    require 'jfac/index.html';
}


function renderLatchel() {
    $homeCtrl = new \Latchel\HomeController();

    // render the UI index
    $homeCtrl->index();
}