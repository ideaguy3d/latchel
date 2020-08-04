<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/3/2020
 * Time: 10:00 PM
 */

/*echo var_export($_ENV, true);
echo "\n\n" . var_export($argv, true);
echo "\n\n \$_SERVER['argv'] = \t" . var_export($_SERVER['argv'], true);
echo "\n\n getenv() = " . var_export(getenv(), true);*/

// global $_ENV seems to have to manually be given values to contain anything
$_ENV['config'] = (require __DIR__ . '/config.php');

echo "\n\n" . var_export($_ENV, true);

$formModel = "\n_> feature extraction for %s model computed. ~%s\n";
$formSpanner = "\n-- spinning up %s spanner. ~%s\n";

$perceptron = fn($e, $ai_ml) => printf($formModel, $e, $ai_ml);
$cluster = fn($e, $ai_ml) => printf($formSpanner, $e, $ai_ml);

if($argv[3] ?? null) {
    // $ php zce.php perceptron cluster ml
    'ml' == $argv[3] ? $perceptron($argv[1], $argv[3]) : $cluster($argv[2], $argv[3]);
    // $ php zce.php perceptron cluster ai
    'ai' == $argv[3] ? $perceptron($argv[1], $argv[3]) : $cluster($argv[2], $argv[3]);
}


echo "\n\n";