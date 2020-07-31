<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 7/31/2020
 * Time: 1:07 AM
 */

namespace A;
function hi() { echo __NAMESPACE__; }
$closure = function() { echo __NAMESPACE__; };

namespace B;
function hi() { echo __NAMESPACE__; }
$closure = function() { echo __NAMESPACE__; };

namespace C;
//\B\hi(); // B
$closure(); // B