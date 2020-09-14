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

class GammaAnimal
{
    protected string $nature;
    protected string $ageRange;
    
    public function animalNature(): Closure {
        $boundVariable = 'Animal';
        return function() use ($boundVariable) {
            return "\n__> This $boundVariable has a $this->nature nature.\n";
        };
    }
    
    /**
     * @param $out_of - this value must be something generic, that would make
     *      sense to set as a base value for all classes that inherit it
     *      because "->bindTo()" will be getting used
     *
     * @return Closure
     */
    public function animalCuteness($out_of): Closure {
        $cuteness = 0.01; // base score
        $scoring_system = [
            $out_of, "\n_>> %s is a %.2f out of $out_of\n",
            fn($c = null) => $c ?? $cuteness / $out_of * 10
        ];
        
        // this closure will be relative to each child class
        return function($animal) use ($scoring_system, $cuteness) {
            if(0 === strcmp('dog', $animal)) $cuteness = 10;
            else if(0 === strcmp('cat', $animal)) $cuteness = 11;
            $score = $scoring_system[2]($cuteness);
            return sprintf($scoring_system[1], $this->ageRange, $score);
        };
    }
}

class GammaDog extends GammaAnimal
{
    protected string $nature = 'Playful';
    
    public function __construct($ageRange) { $this->ageRange = $ageRange; }
}

class GammaCat extends GammaAnimal
{
    protected string $nature = 'Cuddly';
    
    public function __construct($ageRange) { $this->ageRange = $ageRange; }
}

$cat = new GammaCat('kitten');
$dog = new GammaDog('puppy');

$petNature = $cat->animalNature();
echo $petNature();
$petNature = $petNature->bindTo($dog);
echo $petNature();

$animalCuteness = $cat->animalCuteness(10);
echo $animalCuteness('cat');
$animalCuteness = $animalCuteness->bindTo($dog);
echo $animalCuteness('dog');

$debug = 1;