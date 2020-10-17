<?php
/*
    "Because thinking of var names is hard"
    -- short var names --
    set, rec, dim, per, vec, cep, tro, foo, net, fu, bar, cas, xi, nu, mu, rho, fi, a, b, c, ds, x, y, z, stat
    -- cool var names --
    perceptron, metric, nueronet, cascade, cluster, matrix, feature, omicron, sigma, iota, epsilon, gamma, omega,
    -- combinations --
    metricSet, cascadeVec, iotaStat, epsilonFoo, featureX, nueronetA, etc.

(?=  )
(?<=  )
(?!  )
(?<!  )
(?>  )
(?#  )
(  |(?R))
(?(  )  |  )

*/
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 10/11/2020
 * Time: 2:58 AM
 */
 
// basic sub patterns
$p = '';

// once-only sub patterns (aka atomic groups)
$p1 = '/\d+foo/'; // slow
$p1 = '/(?>d+)foo/'; // fast
$subject_string = '54321bar';
$p2 = '/(\D+|<\d+>)*[!?]/'; // super slow
$p2 = '/((?>D+)|<\d+>)*[!?]/'; // fast
$subject_string = 'jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj';

// conditional sub patterns



// end of file