<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/18/2020
 * Time: 5:18 PM
 *
 * "Because thinking of var names is hard"
 * -- short var names --
 * set, rec, dim, per, vec, cep, tro, foo, net, fu, bar, cas, xi, nu, mu, rho, fi, a, b, c, ds, x, y, z, stat
 * -- cool var names --
 * perceptron, metric, nueronet, cascade, cluster, matrix, feature, omicron, sigma, iota, epsilon, gamma, omega,
 * -- combinations --
 * metricSet, cascadeVec, iotaStat, epsilonFoo, featureX, nueronetA, etc.
 */


(function() {
    
    $a1 = [1, 2, 3, 4, 5];
    $a2 = $a3 = $a4 = $a5 = $a6 = $a7 = $a1;
    $a8 = $a9 = $a10 = $a11 = $a12 = $a13 = $a1;
    
    $r1 = ['x', 'y', 'z'];
    $r2 = $r3 = $r4 = $r5 = $r6 = $r7 = $r1;
    $r8 = $r9 = $r10 = $r11 = $r12 = $r13 = $r1;
    
    // positive offset & length
    $s1 = array_splice($a1, 2);
    $s2 = array_splice($a2, 2, 2);
    $s3 = array_splice($a3, 1, 2, $r3);
    $m1 = array_merge($s1, $r2, $s2);
    
    // negative offset
    $s4 = array_splice($a4, -2, 1, $m1);
    $s5 = array_splice($a5, -3, 2);
    
    // negative length
    $s6 = array_splice($a6, 1, -2);
    
    $s7 = array_splice($a7, 0, count($a7), [$a8]);
    $s8 = array_splice($a8, -2);
    
    $debug = 1;
})();
