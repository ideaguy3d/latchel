<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 6/22/2020
 * Time: 11:43 PM
 */

namespace julius;


class BinarySearchTree3
{
    /**
     * root node
     */
    private object $root;
    
    public function postOrderTraverse(Callable $visitor): void {
        $this->postRecursive($this->root, $visitor);
    }
    
    private function postRecursive(object $node, Callable $visitor): void {
        if(null !== $node) {
                $this->postRecursive($node->left, $visitor);
                $this->postRecursive($node->right, $visitor);
                $visitor($node->key);
        }
    }
    
    public function preOrderTraverse(Callable $visitor): void {
        $this->preRecursion($this->root, $visitor);
    }
    
    private function preRecursion(object $node, Callable $visitor): void {
        if(null !== $node) {
            $visitor($node->key);
            $this->preRecursion($node->left, $visitor);
            $this->preRecursion($node->right, $visitor);
        }
    }
    
    public function inOrderTraverse(Callable $visitor): void {
        $this->inRecursion($this->root, $visitor);
    }
    
    public function inRecursion(object $node, Callable $visitor) {
        if(null !== $node) {
            $this->inRecursion($node->left, $visitor);
            $visitor($node->key);
            $this->inRecursion($node->right, $visitor);
        }
    }
}