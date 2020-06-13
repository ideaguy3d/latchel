<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/17/2019
 * Time: 1:17 AM
 */

namespace julius;

use \Closure;

class BinarySearchTree
{
    private $root = null;
    
    /**
     * Primary Public Function
     *
     * Makes an indirect recursive call
     *
     * @param $key
     */
    public function insert($key) {
        $node = new class ($key) {
            public $key;
            public $left;
            public $right;
            
            public function __construct($key) {
                $this->key = $key;
                $this->left = null;
                $this->right = null;
            }
        };
        
        if($this->root === null) {
            $this->root = $node;
        }
        else {
            $this->insertNode($this->root, $node);
        }
    } // END OF: insert()
    
    /**
     * Private Recursive Helper Function
     *
     * We don't operate on the result of recursive call so we don't
     * return the recursive call.
     *
     * The recursive call will just do internal work so nothing has
     * to be returned
     *
     * @param $node
     * @param $newNode
     */
    private function insertNode($node, $newNode): void {
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
    } // END OF: insertNode()
    
    /**
     * @return mixed root - can be null or a Node
     */
    public function getRoot() {
        return $this->root;
    }
    
    /**
     * Primary Public function
     *
     * @param $key
     *
     * @return bool
     */
    public function search($key) {
        return $this->searchNode($this->root, $key);
    }
    
    private function searchNode($node, $key) {
        if($node === null) {
            return false;
        }
        if($key < $node->key) {
            return $this->searchNode($node->left, $key);
        }
        else if($key > $node->key) {
            return $this->searchNode($node->right, $key);
        }
        else {
            return true;
        }
    }
    
    /**
     * Primary Public Function
     *
     * @param \Closure $callback
     */
    public function inOrderTraverse(\Closure $callback) {
        $this->inOrderTraverseNode($this->root, $callback);
    }
    
    /**
     * Private Recursive Helper Function
     *
     * @param $node
     * @param $callback
     */
    private function inOrderTraverseNode($node, $callback) {
        $key = $node->key ?? 'null';
        //echo "\ncurrent key: $key";
        
        if($node !== null) {
            $this->inOrderTraverseNode($node->left, $callback);
            $recurse1 = "point1";
            $callback($key);
            $this->inOrderTraverseNode($node->right, $callback);
            $recurse2 = 'point2';
        }
    }
    
    /**
     * Primary Public Function
     *
     * @param Closure $callback
     */
    public function preOrderTraverse(\Closure $callback) {
        $this->preOrderTraverseNode($this->root, $callback);
    }
    
    private function preOrderTraverseNode(?object $node, callable $callback): void {
        if($node !== null) {
            $callback($node->key);
            $this->preOrderTraverseNode($node->left, $callback);
            $this->preOrderTraverseNode($node->right, $callback);
        }
    }
    
    public function postOrderTraverse(Closure $callback): void {
        $this->postOrderTraverseNode($this->root, $callback);
    }
    
    private function postOrderTraverseNode(?object $node, Closure $callback): void {
        if(null !== $node) {
            $this->postOrderTraverseNode($node->left, $callback);
            $this->postOrderTraverseNode($node->right, $callback);
            $callback($node->key);
        }
    }
    
    /**
     * Get the key with the lowest value
     *
     * @param $key
     */
    public function min($key) {
    
    }
    
    /**
     * Get the key w/the highest value
     *
     * @param $key
     */
    public function max($key) {
    
    }
    
    /**
     * Remove a node via its' key
     *
     * @param $key
     */
    public function remove($key) {
    
    }
    
} // END OF: class BinarySearchTree