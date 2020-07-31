<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 7/30/2020
 * Time: 4:37 PM
 */

class Random
{
    private string $model = 'Cross Validate';
    
    public function &modelRef(): string {
        return $this->model;
    }
    
    public function updateModel(string $type): void {
        $this->model = $type;
    }
}

$fast = new Random;
$dim = &$fast->modelRef();
$fast->updateModel('Set Reduce');

function simpleRecursion() {
    $x = 1;
    $y = regress($x);
    $z = $x + $y;
    echo "\n\n z = $z\n";
    
    function regress($r) {
        if($r < 500) {
            echo "$r\n";
            return regress($r + 1);
        }
        return $r;
    }
}


/* Bind Closure practice */

class Cluster
{
    public function reduceCluster($struct): Closure {
        $x = 2;
        return function(int $y) use ($x, $struct): string {
            return $this->metric . ' metric cluster computed '
                . number_format($x ^ $y) . " $struct";
        };
    }
}

class CrossCluster extends Cluster
{
    public string $metric = 'Cross Validate';
}

class ParallelCluster extends Cluster
{
    public string $metric = 'Parallel Validate';
}

$cluster = new CrossCluster();
$clusterClosure = $cluster->reduceCluster('hash');
$comp = $clusterClosure(8);
echo "\n (: $comp \n";
$clusterClosure = $clusterClosure->bindTo(new ParallelCluster());
$comp = $clusterClosure(9);
echo "\n (: $comp \n";