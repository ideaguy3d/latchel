<?php
declare(strict_types=1);

namespace julius;

use Closure;

class BinaryTree4
{
    private object $root;
    
    public function preOrderTraverse(Closure $visitor): void {
        $this->preRecursion($this->root, $visitor);
    }
    
    private function preRecursion(object $node, Closure $visitor): void {
        if(null !== $node) {
            $visitor($node->key);
            $this->preRecursion($node->left, $visitor);
            $this->preRecursion($node->right, $visitor);
        }
    }
    
    public function inOrderTraverse(Closure $visitor): void {
        $this->inRecursion($this->root, $visitor);
    }
    
    private function inRecursion(object $node, Closure $visitor): void {
        if(null !== $node) {
            $this->inRecursion($node->left, $visitor);
            $visitor($node->key);
            $this->inRecursion($node->right, $visitor);
        }
    }
    
    public function postOrderTraverse(Closure $visitor): void {
        $this->postRecursion($this->root, $visitor);
    }
    
    private function postRecursion(object $node, Closure $visitor): void {
        if(null !== $node) {
            $this->postRecursion($node->left, $visitor);
            $this->postRecursion($node->right, $visitor);
            $visitor($node->key);
        }
    }
}