<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 2/16/2020
 * Time: 5:20 PM
 */

$strInput = require 'strInput.php';

getTabbingCount($strInput, 0);

function getTabbingCount(array $tabbingInput, int $i): void {
    $notes = $tabbingInput[$i];

    echo "\n\n--------------------------------\n\n" . $notes;

    preg_match('/\d?\d?\w.*tab.*\w/i', $notes, $tabs);

    //echo "\n\n $i) matches = " . ($tabs[0]);

    if (++$i === count($tabbingInput)) return;
    getTabbingCount($tabbingInput, $i);
}



//