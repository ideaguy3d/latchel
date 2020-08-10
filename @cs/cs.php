<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 12/8/2019
 * Time: 1:46 AM
 */

namespace compSciPractice
{
    
    require 'binary-trees/BinarySearchTree2.php';
    require 'sorts/ArraySort.php';
    
    use julius\BinarySearchTree2;
    use julius\ArraySort;
    
    /* data sets to practice on */
    $set1 = [10000001, 11, 7, 99, 15, 5, 3, 9, 8, 10, 13, 12, 14, 20, 18, 150, 25, 15, 6];
    $set2 = [5, 4, 3, 2, 1, 0];
    $set3 = [3, 1, 9, 0, 55, 22];
    $set4 = [6, 5, 4, 3, 2, 1];
    $set5 = [3,5,1,6,4,7,2];
    
    /* functions to invoke */
    //binarySearchTree($set1);
    //arraySort($set3);
    //mergeSort($set1);
    quickSort($set5);


//-----------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------
    
    
    function quickSort (array $set): void {
        require "sorts/quick/FirstQuickSort.php";
        $qs = (new \FirstQuickSort($set))->sort();
        echo var_export($qs, true);
    }
    
    
    function arraySort(array $set) {
        $sort = new ArraySort($set);
        $sortedArray = $sort->mergeSort();
        echo "__>> The sorted Array ^_^ \n" . var_export($sortedArray, true) . "\n";
    }
    
    
    function mergeSort(array $set1) {
        // test sort
        $mergeSort = require 'sorts/merge/mergeSort6.php';
        echo "\n\nSorted set = \n" . var_export($mergeSort($set1), true) . "\n//\n";
    }
    
    
    function binarySearchTree($set) {
        $binaryTree = new BinarySearchTree2();
        
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
        
    } // END OF: binarySearchTree()
    
} // END OF: namespace compSciPractice{}