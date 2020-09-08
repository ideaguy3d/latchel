<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/6/2020
 * Time: 4:41 AM
 */
 

class StatisticalComputing
{
    public int $n = 90;
    
    public function &getBinomialDistExpNum() {
        return $this->n;
    }
}

$stat = new StatisticalComputing();

$numOfExperiments = &$stat->getBinomialDistExpNum();

$stat->n += 2000;

echo "\n_> stat used $numOfExperiments input values\n";
