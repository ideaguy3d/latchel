<?php
/*
    "Because thinking of var names is hard"
    -- short var names --
    set, rec, dim, per, vec, cep, tro, foo, net, fu, bar, cas, xi, nu, mu, rho, fi, a, b, c, ds, x, y, z, stat
    -- cool var names --
    perceptron, metric, nueronet, cascade, cluster, matrix, feature, omicron, sigma, iota, epsilon, gamma, omega,
    -- combinations --
    metricSet, cascadeVec, iotaStat, epsilonFoo, featureX, nueronetA, etc.


(?=  ) // pos look ahead
(?!  ) // neg look ahead
(?<=  ) // pos look behind
(?<!  ) // neg look behind

(?>  ) // once-only subpattern

(?(  )  |  )  // conditional

(?#  )  // comment

((?R)  )  // recursive

*/
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 10/11/2020
 * Time: 2:58 AM
 */

// chained assertion
$str = ['2020 oct', '2013 oct'];
$p = '/(?<=\d{4})(?<!2013|2015).oct/i';
foreach($str as $s) {
    preg_match($p, $s, $m);
    $debug = 1;
}

// nested assertion
$sa = ['barfoobaz', 'coofoobar', 'foobar'];
$p = '/(?<=(?<!bar)foo)baz/';

$s1 = 'The fact is PHP is better than R, a lot better';
$s2 = 'It is worth noting that PHP can do anything R can do';
$s3 = 'perstatron';
$s4 = 'tronstatper';

// look ahead (?=  ) and (?!  )
$patterns = ['/stat(?=per)/', '/stat(?!cep)/'];
foreach($patterns as $pattern) {
    preg_match($pattern, $s4, $m4);
    preg_match($pattern, $s3, $m3);
    $debug = 1;
}

// look behind (?<=  ) and (?<!  )
$patterns = ['/(?<=per)stat/', '/(?<!tron)stat/'];
foreach($patterns as $pattern) {
    preg_match($pattern, $s3, $m3);
    preg_match($pattern, $s4, $m4);
    $debug = 1;
}

// assertion chaining
$opinion1 = ' is better than ';
$opinion2 = ' is worse than ';
$len = strlen($opinion1);
$patterns = [
    "/(?<=PHP.\{$len\})(?<=$opinion1|$opinion2)R/",
    '/PHP(?=.+anything.+)(?=.+R)/'
];
foreach($patterns as $pattern) {
    preg_match($pattern, $s1, $m1);
    preg_match($pattern, $s2, $m2);
    $debug = 1;
}










// end of file