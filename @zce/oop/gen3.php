<?php declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 7/29/2020
 * Time: 9:52 PM
 */

use oop\models\ModelOne;

const GEN_LIMIT = 4;

$percep = per();

foreach($percep as $metric) {
    echo "\n\: $metric\n";
}

function per() {
    $types = ['classify', 'predict', 'recommend'];
    $fastArr = SplFixedArray::fromArray($types);
    
    $struct = new class() {
        public string $x = 'Hello';
        public string $y = 'World';
        public int $z = GEN_LIMIT * 4;
    };
    
    yield from $fastArr;
    $archetype = new ModelOne($fastArr[2]);
    yield from (array)$struct;
    yield from (array)$archetype;
    yield from cep();
    $archetype->update();
}

function cep() {
    for($i = 0; $i < GEN_LIMIT; $i++) {
        yield 'test' => $i;
    }
}
