<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 12/8/2019
 * Time: 1:46 AM
 */

require('BinaryTree.php');

use julius\BinaryTree;

$set1 = [11, 7, 15, 5, 3, 9, 8, 10, 13, 12, 14, 20, 18, 25, 6];

$binaryTree = new BinaryTree();

foreach($set1 as $v) {
    $binaryTree->insert($v);
}
























// end of php file