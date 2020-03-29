<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 3/28/2020
 * Time: 6:42 PM
 *
 * 1) B
 * 2) B
 * 3) C
 * 4) C
 * 5) A
 * 6) D
 * 7)
 */


// question 2, a fatal error occurs due to Baz->setBar()
if(($practiceQuestion = false)) {

    interface someInter
    {
        public function getFoo();

        public function setFoo($foo);
    }

    interface otherInter
    {
        public function getFoo();

        public function setBar();
    }

    class Baz implements someInter, otherInter
    {
        //private $foo;
        //private $bar;

        public function getFoo() {
            return 'foo';
        }

        public function setFoo($foo) {
            $this->foo = $foo;
        }

        public function setBar($bar) {
            $this->bar = $bar;
        }
    }

    $someClass = new Baz();

    $someClass->getFoo();
    //$someClass->setFoo('hi');
    //$someClass->setBar('sup');
}

// question 3, fatal error due to protected access
if(($practiceQuestion = false)) {
    abstract class BaseClass
    {
        abstract protected function someProtected();

        public function threeDots() {
            return '...';
        }
    }

    class BaseAncestor extends BaseClass
    {
        protected function someProtected() {
            echo $this->threeDots();
        }
    }

    $baseAncestor = new BaseAncestor();
    $baseAncestor->someProtected();
}

// question 5
if(($practiceQuestion = true)) {
    // can static functions be abstract?
    abstract class MyStatic
    {
        abstract static public function helloWorld();
    }

    class MyStaticAncestor extends MyStatic
    {
        static public function helloWorld() {
            return 'Hello World';
        }
    }

    // can static functions be inherited?
    class MyOtherStatic extends MyStaticAncestor
    {
        static public function helloWorld() {
            return parent::helloWorld() . " and Universe!";
        }
    }

    echo MyOtherStatic::helloWorld();
}


$debug = 1;