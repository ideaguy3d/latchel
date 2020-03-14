<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 10/6/2019
 * Time: 11:29 PM
 */


//basicGeneratorPractice();
//keyValueGeneratorPrac();
//yieldByReferencePractice();
//pracYieldReturn();
pracGeneratorDelegation();


/**
 * basic generator prac
 */
function basicGeneratorPractice(): void {
    // explicitly return a generator
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

/**
 * practice "yield $key => $value"
 */
function keyValueGeneratorPrac(): void {
    // yield by key => value
    function genKeyVal(): Generator {
        $key = 'paper_count';
        for ($i = 0; $i < 5; ++$i) {
            yield $key => $i;
        }
    }

    foreach (genKeyVal() as $key => $val) {
        echo "\n$key = $val";
    }
}

/**
 * yield by reference function &funcName, I don't understand this though,
 * I probably need to work the section on returning functions by ref:
 */
function yieldByReferencePractice() {
    function &pracByRef($price): Generator {
        $x = 10 + $price;
        $x = $x * 0.0825;
        yield $x;
    }

    $y = pracByRef(24.99);
    $y++;

    return $y;
}

/**
 * practice using return after all yield's:
 */
function pracYieldReturn () {
    function clientPrint(): string {
        return 'piece printed';
    }

    function clientMail(): string {
        return 'piece mailed';
    }

    function clientJobDone($status): string {
        // $status has already been yield'ed so it's blank
        return "piece has been printed and mailed because $status.";
    }

    function clientGenerator() {
        yield clientPrint();
        $mail = yield clientMail();

        return clientJobDone($mail);
    }

    $gen = clientGenerator();

    foreach ($gen as $key => $value) {
        echo "\n$key, $value\n";
    }

    echo "\n" . $gen->getReturn() . "\n";
}

/**
 * practice generator delegation (aka "yield from"):
 */
function pracGeneratorDelegation () {
    function generator(): Generator {
        $a = [1,2,3];
        yield from $a;
        yield from range(4,6);
        yield from sevenAteNine();
    }
    
    function sevenAteNine (): Generator {
        for($i=7; $i<10; ++$i) {
            yield $i;
        }
    }

    $gen = generator();

    foreach ($gen as $value) {
        echo "\n$value\n";
    }
}



$break = 'point';

//