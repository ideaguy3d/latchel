<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/8/2019
 * Time: 6:38 PM
 */


// catch a fatal error
try {
    // notice error
    echo $nonExistentVar;

    // fatal error
    doesNotExistFunction();
}
catch(Error $e) {
    // a few helpful "magic constants"
    $mc = __METHOD__ . ' L' . __LINE__ . " in "  . __FILE__ . "\n\n";
    echo "__>> FATAL ERROR: " . $e->getMessage() . $mc;
}









//