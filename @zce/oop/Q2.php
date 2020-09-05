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
if(($practiceQuestion = true)) {
    
    interface SomeInter
    {
        public function getFoo();
        
        public function setFoo($foo);
    }
    
    interface OtherInter
    {
        public function getFoo();
        
        public function setBar($bar);
    }
    
    class Baz implements SomeInter, OtherInter
    {
        private $foo;
        private $bar;
        
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
    
    echo "\n\n" . $someClass->getFoo();
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

// question 5, understanding static functions better
if(($practiceQuestion = true)) {
    // can static functions be abstract?
    abstract class MyStatic
    {
        abstract public static function helloWorld();
    }
    
    class MyStaticAncestor extends MyStatic
    {
        public static function helloWorld() {
            return 'Hello World';
        }
    }
    
    // can static functions be inherited?
    class MyOtherStatic extends MyStaticAncestor
    {
        public static function helloWorld() {
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
if(($practiceQuestion = false)) {
    class Magic
    {
        public $a = "A";
        protected $b = ['a' => 'A', 'b' => 'B', 'c' => 'C'];
        protected $c = [1, 2, 3];
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