<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 10/6/2019
 * Time: 11:29 PM
 */


//basicGeneratorPractice();

function basicGeneratorPractice(): void {

    /**
     * basic generator prac
     *
     * @param int $c
     * @return Generator
     */
    function genOne(int $c): Generator {
        for ($i = 0; $i < $c; $i++) {
            yield $i;
        }
    }

    $x = 0;
    foreach (genOne(10) as $item) {
        $x += $item;
        echo "\n $item";
    }
}

//keyValueGeneratorPrac();

function keyValueGeneratorPrac(): void {
    // yield by key => value
    function genKeyVal(): Generator {
        for ($i = 0; $i < 5; ++$i) {
            yield 'paper_count' => $i;
        }
    }

    foreach (genKeyVal() as $key => $val) {
        echo "\n$key = $val";
    }
}

// yield by reference function &fname

// yieldByReferencePractice();

function yieldByReferencePractice() {
    function &pracByRef(): Generator {
        $x = 10;
        yield $x;
    }

    $y = pracByRef();
    $y++;

    return $y;
}

function clientPrint () {
    return 'piece printed';
}

function clientMail () {
    return 'piece mailed';
}

function clientJobDone ($status) {
    return 'piece has been printed and mailed';
}

function clientGenerator (): Generator {
    $print = yield clientPrint();
    $mail = yield clientMail();
    return clientJobDone($mail);
}

$gen = clientGenerator();

foreach ($gen as $key => $value) {
    echo "\n$key, $value\n";
}

echo $gen->getReturn();



$break = 'point';

//