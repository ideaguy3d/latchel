<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/17/2019
 * Time: 3:35 PM
 */


// encoding / multi byte / char output prac

newOffset();

function newOffset () {
    $v = new StrArrayAccess('Perceptron');
    
    // now it works
    $v[-1] = '';
    
    // now it works
    unset($v[-1]);
}

function oldOffset () {
    $v = 'Perceptron';
    $v = substr_replace($v, '', -1, 1);
    
    // won't work
    $v[-1] = '';
    
    // won't work and fatal error
    unset($v[-1]);
}






// end of file