<?php

class A
{
    public static function foo() {
        // the static keyword will resolve to the last non-forward called
        echo static::who();
    }
    
    public static function who() {
        return 'A';
    }
}

class B extends A
{
    public static function test() {
        A::foo(); // non-forwarded call 2
        parent::foo();
        self::foo();
    }
}

class C extends B
{
    public static function who() {
        return 'C';
    }
}

// ACC
C::test(); // fully resolved non-forwarded call 1