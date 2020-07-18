<?php
declare(strict_types=1);

require __DIR__ . '\vendor\autoload.php';

session_start();

//-----------------------------------------
//---------- _Application_Start_ ----------
//-----------------------------------------
$renderLatchel = true;
$fac = $_GET['fac'] ?? null;

if (empty($_SESSION['count'])) {
    $_SESSION['count'] = 1;
}
else {
    $_SESSION['count']++;
}

if ($renderLatchel) {
    renderLatchel();
}
else {
    if ($fac) {
        $_SESSION['fac'] = $fac;
    }
    else {
        $facApp = require 'jfac/jfac.php';
        $sessionCount = $_SESSION['count'];
        $sid = session_id();
        $sessionFac = $_SESSION['fac'] ?? 'NO_FAC';
        $facApp($sid, $sessionCount, $sessionFac);
    }
}


function renderLatchel() {
    $homeCtrl = new \Latchel\HomeController();

    // render the UI index
    $homeCtrl->index();
}