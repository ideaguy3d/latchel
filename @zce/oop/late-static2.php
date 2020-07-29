<?php

class Naive
{
    public static function regress() {
        echo static::logistic();
    }
    
    public static function logistic() {
        $reflected = new ReflectionClass('SplFixedArray');
        return $reflected->getMethods()[2];
    }
}

class Bayes extends Naive
{
    public static function forest() {
        Naive::regress();
        self::regress();
        static::regress();
        parent::regress();
    }
    
    public static function regress() {
        echo self::logistic();
        Adaline::transact();
    }
    
    public static function logistic() {
        $reflected = new ReflectionClass('SplFixedArray');
        return $reflected->getMethods()[1];
    }
}

class Adaline extends Bayes
{
    public static function regress() {
        echo self::logistic();
    }
    
    public static function transact() {
        echo 'transaction start, rollback, commit';
    }
    
    public static function logistic() {
        $reflected = new ReflectionClass('SplFixedArray');
        return $reflected->getMethods()[0];
    }
}

Adaline::forest();