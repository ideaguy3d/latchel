<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/8/2020
 * Time: 4:28 PM
 */

session_start();

// session constants
$sid = SID;

// return values of session_status()
$sessionNone = PHP_SESSION_NONE;
$sessionActive = PHP_SESSION_ACTIVE;
$sessionDisabled = PHP_SESSION_DISABLED;

$debug = 1;