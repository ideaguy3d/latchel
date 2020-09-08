<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/7/2020
 * Time: 5:06 PM
 */

//keyPrac();
edgeCaseOne();

function edgeCaseOne () {
    $ar = ["1" => "A", 1 => "B", "C", 2 => "D"];
    
    echo __FUNCTION__ . " count = " . count($ar) . "\n\n";
    
    $debug = 1;
}

function keyPrac() {
    $cart = [
        'fruit' => [
            'apples' => [
                'unit' => 'pound',
                'cost' => '2',
            ],
        ],
        'vegetables' => [
            '1.75' => 'cost',
        ],
    ];
    
    // get key of root elems
    while($rootElemKey = key($cart)) {
        echo "$rootElemKey\n";
        next($cart);
    }
    
    while($product = current($cart)) {
        echo key($product) . "\n";
        next($cart);
    }
    
    $debug = 1;
}

function stringKey() {
    $ar = [
        'fruit' => [
            'apples' => [
                'unit' => 'pound',
                'cost' => '2',
            ],
        ],
        'vegetables' => [
            '1.75' => 'cost',
        ],
    ];
    
    echo "cost of apples, " . $ar['fruit']['apples']['cost']
         . ', vegetable is ' . key($ar['vegetables']['1.75']);
    
    $debug = 1;
}
