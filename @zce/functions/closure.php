<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/14/2020
 * Time: 5:32 AM
 *
 * "Because thinking of var names is hard"
 * -- short var names --
 * set, rec, dim, per, vec, cep, tro, foo, net, fu, bar, cas, xi, nu, mu, rho, fi, a, b, c, ds, x, y, z, stat
 * -- cool var names --
 * perceptron, metric, nueronet, cascade, cluster, matrix, feature, omicron, sigma, iota, epsilon, gamma, omega,
 * -- combinations --
 * metricSet, cascadeVec, iotaStat, epsilonFoo, featureX, nueronetA, etc.
 */

echo setMetrics('sales', 'cost', 'net_total');

function setMetrics(...$metrics): string {
    $lambda = function() use ($metrics) {
        [$sales, $cost, $net_total] = $metrics;
        return "\n_> m1: $sales, m2: $cost\n";
    };
    
    return $lambda();
}

$exp = function($value) {
    return $value ** 2;
};

function calc(closure $closure, int $value) {
    return $closure($value);
}

echo "\n_> calc = " . calc($exp, 8);

class AnimalTwo
{
    public string $nature;
    
    function getClosure() {
        $boundVariable = 'Animal';
        return function() use ($boundVariable) {
            return $this->nature . " $boundVariable";
        };
    }
}

class CatTwo extends AnimalTwo
{
    public string $nature = 'Cute';
}

class DogTwo extends AnimalTwo
{
    public string $nature = 'Fun';
}

$anim = new CatTwo;
$anim_nature = $anim->getClosure();
echo "\n__>" . $anim_nature();
$anim_nature = $anim_nature->bindTo(new DogTwo);
echo "\n__>" . $anim_nature();

$debug = 1;