<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/6/2020
 * Time: 5:10 AM
 */


$commission = function($x) {
    return ($x * 2) + 100;
};

function salesCom(closure $lambda, $sale) {
    if($sale > 10000)  return $lambda(0.125);
    return $lambda(0.25);
}

$sale = 4_899;
echo "\n Sales commission = " . salesCom($commission, $sale);
