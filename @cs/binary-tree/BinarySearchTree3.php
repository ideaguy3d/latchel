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
    private object $root;
    
    public function postOrderTraverse($key, $visitor) {
        $this->postRecursion($this->root, $key, $visitor);
    }
    
    public function postRecursion($node, $key, $visitor) {
        if(null !== $node->key) {
            $this->postRecursion($node->left, $node->key, $visitor);
            $this->postRecursion($node->right, $node->key, $visitor);
            $visitor($key);
        }
    }
    
    public function preOrderTraverse() {
    
    }
    
    private function preRecursion() {
    
    }
    
    public function inOrderTraverse() {
    
    }
    
    public function inRecursion() {
    
    }
}