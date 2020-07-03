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
    
    private ?object $root = null;
    
    public function insert($key): void {
        $node = new class($key) {
            public $key;
            public ?object $left;
            public ?object $right;
        
            public function __construct($key) {
                $this->key = $key;
                $this->left = null;
                $this->right = null;
            }
        };
        
        if(null === $this->root) {
            $this->root = $node;
        }
        else {
            $this->insertNode($this->root, $node);
        }
    }
    
    private function insertNode(object $node, object $newNode): void {
        if($newNode->key < $node->key) {
            if($node->left === null) {
                $node->left = $newNode;
            }
            else {
                $this->insertNode($node->left, $newNode);
            }
        }
        else {
            if($node->right === null) {
                $node->right = $newNode;
            }
            else {
                $this->insertNode($node->right, $newNode);
            }
        }
    }
    
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