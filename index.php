<?php
declare(strict_types=1);

require __DIR__ . '\vendor\autoload.php';

session_start();

//-----------------------------------------
//---------- _Application_Start_ ----------
//-----------------------------------------
$renderLatchel = false;

if(empty($_SESSION['count'])) {
    $_SESSION['count'] = 1;
}
else {
    $_SESSION['count']++;
}


if($renderLatchel) {
    renderLatchel();
}
else {
    $facApp = require 'jfac/jfac.php';
    $sessionCount = $_SESSION['count'];
    $sid = session_id();
    echo "fac SID $sid, session count = $sessionCount";
    $facApp($sid, $sessionCount);
}


function renderLatchel() {
    $homeCtrl = new \Latchel\HomeController();

    // render the UI index
    $homeCtrl->index();
}