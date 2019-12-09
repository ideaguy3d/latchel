<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/17/2019
 * Time: 1:17 AM
 */

namespace julius;

class BinaryTree
{
    private $root = null;
    
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
    
    private function insertNode($node, $newNode) {
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
    
    public function getRoot() {
        return $this->root;
    }
    
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
    
    public function inOrderTraverse(\Closure $callback) {
    
    }
    
    private function inOrderTraverseNode($node, $callback) {
    
    }
    
    public function preOrderTraverse(\Closure $callback) {
        
    }
    
    private function preOrderTraverseNode($node, $callback) {
    
    }
    
    public function postOrderTraverse(\Closure $callback) {
    
    }
    
    private function postOrderTraverseNode($node, $callback) {
    
    }
    
} // END OF: class BinarySearchTree