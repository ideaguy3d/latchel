<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 11/17/2019
 * Time: 9:04 PM
 *
 * Traits
 * - trait, self, instanceof, insteadof, as, use, use {}
 */

trait Singleton
{
    private static self $instance;
    
    public static function getInstance() {
        if(!(self::$instance instanceof self)) {
            self::$instance = new self;
        }
        return self::$instance;
    }
}

trait RecommendationCluster
{
    public function featureExtraction() {
        return 'Recommendation features extracted';
    }
    
    public function featureSelection() {
        return 'Selected Recommendation Features from RClusters';
    }
}

trait ClassificationCluster
{
    private static string $ml = 'Classification';
    
    public function featureExtraction() {
        $ml = self::$ml;
        return "$ml features extracted";
    }
    
    public function featureSelection() {
        $ml = self::$ml;
        return "Selected $ml Features from $ml's Cluster";
    }
}

class Quick
{
    use Singleton, ClassificationCluster, RecommendationCluster {
        ClassificationCluster::featureSelection insteadof RecommendationCluster;
        RecommendationCluster::featureExtraction as rExtract;
        ClassificationCluster::featureExtraction insteadof RecommendationCluster;
    }
}

// for the singleton pattern
$cep = Quick::getInstance();
var_dump($cep instanceof Quick);

echo "\n" . $cep->featureSelection() . "\n";
echo "\n" . $cep->featureExtraction() . "\n";

$debug = 1;