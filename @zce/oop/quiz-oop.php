<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 3/28/2020
 * Time: 6:42 PM
 *
 * version 2017
 * 1)  B
 * 2)  B
 * 3)  C
 * 4)  C
 * 5)  A, ?
 * 6)  D
 * 7)  ???
 * 8)  B, D
 * 9)  C
 * 10) C
 * 11)
 *
 */


// question 2, a fatal error occurs due to Baz->setBar()
if (($practiceQuestion = false)) {

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
if (($practiceQuestion = false)) {
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

// question 5, understanding static functions better
if (($practiceQuestion = false)) {
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
            return parent::helloWorld() . " and Universe! ";
        }

        private function goodbyeWorld() {
            return ' it was nice. ';
        }

        public function worldProcess() {
            return self::helloWorld() . ' > ' . $this->goodbyeWorld();
        }
    }

    echo "\n\n" . MyOtherStatic::helloWorld() . "\n\n";

    $myOtherStatic = new MyOtherStatic();
    echo $myOtherStatic->worldProcess();
}

// question 10, magic methods
if (($practiceQuestion = false)) {
    class Magic
    {
        public $a = "A";
        protected $b = array('a' => 'A', 'b' => 'B', 'c' => 'C');
        protected $c = array(1, 2, 3);
        protected $dynamic = [];

        public function __get($v) {
            echo "$v, ";
            //$this->dynamic [] = $v;
            return $this->b[$v];
        }

        public function __set($k, $v) {
            //echo "set $k => $v, ";
            $this->$k = $v;
        }
    }

    $m = new Magic();
    echo $m->a . ', ' . $m->b . ', ' . $m->c . "\n";
    // ->c will not get overwritten
    $m->c = 'CC';
    echo "\n" . $m->a . ', ' . $m->b . ', ' . $m->c . "\n";
}




$debug = 1;