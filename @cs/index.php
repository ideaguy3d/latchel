<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 12/8/2019
 * Time: 1:46 AM
 */

require('BinarySearchTree.php');

use julius\BinarySearchTree;

$set1 = [11, 7, 15, 5, 3, 9, 8, 10, 13, 12, 14, 20, 18, 25, 6];

$binaryTree = new BinarySearchTree();

foreach($set1 as $v) {
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
//var_export($treeSorted);

echo "\n----------------------------------------------------------------------------------\n";






















// end of php file