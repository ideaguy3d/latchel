<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 7/29/2020
 * Time: 7:37 PM
 */

define('GEN_LIMIT', 99);


//simple();
perceptron();

function perceptron () {
    foreach(genOne() as $i =>  $item) {
        $item = var_export($item, true);
        echo "\n$i. $item\n";
    }
}

function simple () {
    $fastArr = new SplFixedArray(GEN_LIMIT);
    foreach(gen() as $item) {
        $eo = 0 === ($item % 2) ? 'even' : 'odd';
        $i = 'even' === $eo ? $item : null;
        if(!is_null($i)) $fastArr[$i] = $eo;
    }
    
    foreach($fastArr as $i => $value) {
        if(empty($value)) continue;
        echo "\nfastArr[$i] = $value\n";
    }
}


function genOne() {
    $tron = '';
    for($i = 0, $j = GEN_LIMIT; $i < GEN_LIMIT; $i++, $j--) {
        $per = ['per' => $i, 'tron' => $tron];
        $tron = GEN_LIMIT - $per['per'];
        yield $per;
        
        $cep = ['per' => $per, 'cep' => $j, 'tron' => $tron];
        $tron = GEN_LIMIT - $cep['cep'];
        yield $cep;
    }
}

function gen() {
    for($i = 0; $i < GEN_LIMIT; $i++) {
        yield $i;
    }
}