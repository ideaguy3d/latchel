<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 7/29/2020
 * Time: 9:09 PM
 */

$r = persistRegress();

foreach($r as $metric) {
    echo "_>> $metric \n";
}
echo "\n\n__> model eval = " . $r->getReturn() . "\n";

function cep() {
    return 'cep';
}

function per($c) {
    return "per$c";
}

function tron($model = 'Neuro') {
    return "$model tron";
}

function regress() {
    $feature = yield cep();
    $set = yield per($feature);
    return tron($set);
}

function persistRegress() {
    $c = cep();
    $feature = yield $c; // null
    $p = per($c);
    $p2 = per($feature);
    $set = yield $p; // null
    $set2 = yield $p2; // null
    if(is_null($set2)) {
        echo "\n\t:/ set2 is NULL \n";
    }
    yield tron($set);
    return tron($p); // 3 yields later, $p retains value
}