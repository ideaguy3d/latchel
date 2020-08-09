<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: julius hernandez alvarado
 * Date: 5/8/2020
 * Time: 10:21 PM
 */

namespace myapp
{
    
    include __DIR__ . '/NamespaceOne.php';
    
    use myapp\utils\hello;

    // doesn't do anything
    echo "\n\n";
    echo uTils\hEllo\wOrLd();
    //echo hello(); // FATAL error
    
    $x = 8 ** 2;
    
    (function() {
        
        $ns = __NAMESPACE__;
        echo "\n\n-- NAMESPACE = $ns --\n";
        
        $hello_World = 'one';
        $hello_world = 'two';
        
        echo "\n$hello_World";
        echo "\n$hello_world";
        
        HIwoRld();
        
        function features() {
            return ['price', 'sales', 'quantity'];
        }
    })();
    
}

namespace zce\basics\q1four {
    try {
        A();
    }
    catch(\Error $e) {
        echo '_>> Error caught in global scope = ' . $e->getMessage();
    }
    
    echo "\n\n";
    
    function A() {
        try {
            b();
        }
        catch(\Exception $e) {
            echo '__> Exception caught in ' . __CLASS__;
        }
    }
    
    function B() {
        C(); // will throw an Error, not an Exception
    }
}

namespace basics\q1five
{
    a(); // -1
    b();
    
    function A () {
        $a = 'apples' <=> 'bananas';
        $b = $a ?? $c ?? 10;
        cx($b, $a);
    }
    
    function B () {
        $bin = [decbin(0), decbin(1), decbin(10)];
        $a = 0 << 1; // 2
        // -1, "10 << 1" get's evaluated first
        $b = 10 <=> 10 << 1;
        cx($b);
    }
}

namespace {
    define('A', 1);
    const B = 2;
    define('C', [A*A, B*B]);
    
    cx(C[1]);
    
    function hiWorld() {
        echo "\nL30";
    }
    
    function Cx (...$cs) {
        foreach($cs as $c) echo "\n:\\ $c\n";
    }
}



