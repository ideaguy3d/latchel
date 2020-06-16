<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 12/8/2019
 * Time: 1:46 AM
 */
declare(strict_types=1);

namespace julius;

use Closure;

class BinarySearchTree2
{
    /*
        getRoot
        search
        insert
        remove
        min
        max
        inOrderTraverse
        preOrderTraverse
        postOrderTraverse
    */
    
    private object $root;
    
    public function postOrderTraverse(Closure $cb): void {
        $this->postOrderTraverseRecurse($this->root, $cb);
    }
    
    private function postOrderTraverseRecurse(object $node, Closure $cb): void {
        if(!is_null($node->key)) {
            $cb($node->key);
            $this->postOrderTraverseRecurse($node->left, $cb);
            $this->postOrderTraverseRecurse($node->right, $cb);
        }
    }
}