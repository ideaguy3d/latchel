<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 12/8/2019
 * Time: 1:46 AM
 */
declare(strict_types=1);

require 'binary-tree/BinarySearchTree3.php';
require 'sort/ArraySort.php';

use julius\BinarySearchTree;
use julius\ArraySort;

$set1 = [10000001,11, 7,99, 15, 5, 3, 9, 8, 10, 13, 12, 14, 20, 18, 150,25, 15, 6];
$set2 = [5, 4, 3, 2, 1, 0];
$set3 = [3, 1, 9, 0, 55, 22];
$set4 = [6, 5, 4, 3, 2, 1];
$mergeSort = require 'sort/merge/mergeSort6.php';

// test sort
//echo "\n\nSorted set = \n" . var_export($mergeSort($set1), true) . "\n//\n";

function sortPractice(array $set) {
    $sort = new ArraySort($set);
    $sortedArray = $sort->mergeSort();
    echo "__>> The sorted Array ^_^ \n" . var_export($sortedArray, true) . "\n";
}

function binarySearchTreePractice($set) {
    $binaryTree = new BinarySearchTree3();
    
    foreach($set as $v) {
        $binaryTree->insert($v);
    }
    
    echo "\n----------------------------------------------------------------------------------\n";
    
    $treeSorted = [];
    $callback = function($value) use (&$treeSorted) {
        $treeSorted[] = "n<$value>";
        echo " in[$value] ";
    };
    
    $binaryTree->inOrderTraverse($callback);
    
    echo "\n----------------------------------------------------------------------------------\n";
    
    $preOrderTraverseCallback = function($value) {
        echo " pr[$value] ";
    };
    
    $binaryTree->preOrderTraverse($preOrderTraverseCallback);
    
    //echo "\n\n";
    //var_export($treeSorted, true);
    
    echo "\n----------------------------------------------------------------------------------\n";
    
    $postOrderTraverseCallback = function($node) {
        echo " post[$node] ";
    };
    
    $binaryTree->postOrderTraverse($postOrderTraverseCallback);
    
    echo "\n----------------------------------------------------------------------------------\n";
}






















// end of php file