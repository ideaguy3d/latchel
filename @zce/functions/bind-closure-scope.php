<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 7/31/2020
 * Time: 1:17 AM
 */

$x = fn($a) => fn($b) => $a + 1 + $b + 2;

echo "\n" . $x(1)(2) . "\n\n";

(function() {
    
    class A
    {
        public string $prop;
        
        public function getLambda() {
            $var = 'var';
            return function() use ($var) {
                return "$this->prop --$var";
            };
        }
    }
    
    class B extends A
    {
        public string $prop = 'beta';
    }
    
    class C extends A
    {
        public string $prop = 'cron';
    }
    
    $obj = new C;
    $lambda = $obj->getLambda();
    $r = $lambda();
    echo "\n__>> $r \n";
    $lambda = $lambda->bindTo(new B);
    $r = $lambda();
    echo "\n__>> $r \n";
    $debug = 1;
})();

$x = 1;