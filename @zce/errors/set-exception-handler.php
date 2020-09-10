<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/10/2020
 * Time: 1:40 AM
 */

class PerceptronException// extends Exception
{
    public function handle($args) {
        echo $args->getMessage();
        //trigger_error('AI_ModelError');
    }
}

set_exception_handler([PerceptronException::class, 'handle']);

//correctOrder();
//oddOrder();
noCatch();

function incorrectOrder() {
    try {
        throw new PerceptronException('recursion depth max limit');
    }
    catch(Throwable $th) {
        echo "\n_> Throwable";
    }
    catch(Error $er) {
        echo "\n_> Error";
    }
    catch(Exception $ex) {
        echo "\n_> Exception";
    }
    catch(PerceptronException $pe) {
        echo "\n_> Perceptron Exception";
    }
}

function correctOrder() {
    try {
        throw new PerceptronException('recursion depth max limit');
    }
    catch(PerceptronException $pe) {
        echo "\n_> Perceptron Exception:\n";
    }
    catch(Exception $ex) {
        echo "\n_> Exception";
    }
    catch(Error $er) {
        echo "\n_> Error";
    }
    
    catch(Throwable $th) {
        echo "\n_> Throwable";
    }
}

function oddOrder() {
    try {
        throw new PerceptronException('recursion depth max limit');
    }
    catch(Error $er) {
        echo "\n_> Error: " . $er->getMessage();
    }
    catch(PerceptronException $pe) {
        echo "\n_> Perceptron Exception" . $pe->getMessage();
    }
    catch(Throwable | Exception $th) {
        echo "\n_> Throwable: " . $th->getMessage();
    }
}

function noCatch () {
    throw new PerceptronException('recursion depth max limit');
}