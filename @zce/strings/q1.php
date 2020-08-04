<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/3/2020
 * Time: 6:04 PM
 */

namespace zce\strings\julius;

$x = 1;
$y = '1';

if($x < $y) echo 'one';
else if($y < $x) echo 'two';
else if($y <= $x) echo 'three';
else if($x <= $y) echo 'four';
else echo 'none';

echo "\n\n L20 = " . ($x <=> $y);
echo "\n\n L21 = " . ($y <=> $x);

$x = 'programmers like math';
$x = strtr($x, 'math', 'code');
echo "\n\nL25 = $x";

$x = 'Dogs do nothing but sleep';
$x = strtr($x, 'Dog', 'Cat');
echo "\n\nL29 = $x";

//matchPatterns();
regexCallback();

function regexCallback() {
    $subject = 'features cluster regression nueronet PHP cluster algorithm';
    $pattern = '/\b(?<spanner>cluster|nueronet)\b/';
    $callback = function(array $matches) {
        $spanner = $matches['spanner'] ?? null;
        if('cluster' === $spanner) return 'shard';
        else if ('nueronet' === $spanner) return 'perceptron';
        return 'spanner';
    };
    $subject = preg_replace_callback($pattern, $callback, $subject, -1, $count);
    echo $subject;
}

function matchPatterns() {
    $subject = "Knock over christmas tree stare at kittens@catsaregreat.com the wall, play with food and get confused by dust or going to catch siamese@catsaregreat.com the red dot today going to catch the red dot today.";
    static $patterns = [
        '/[a-z]*.[a-z.]+/',
        '/\b[a-z]+@[a-z]+.com\b/', // works
        '/\b[a-z]+@[a-z.]+\b/', // works
        '/(\b[a-z]*@\b)([a-zA-Z\d]+)/', // works
        '/(\S*)@(\w*).(\S*)/' // works
    ];
    $pattern = array_shift($patterns);
    preg_match_all($pattern, $subject, $matches);
    
    if(count($patterns) > 0)
        return matchPatterns();
    return null;
}

echo "\n\n";