<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/24/2019
 * Time: 3:15 PM
 */

abstract class Paintings
{
    abstract protected function toDescendStairs();

    protected function fadedMemories() {
        echo "a painting of memories that once were";
    }

    public function __construct() {
        echo "in Paintings{} class";
    }
}

class Reviews extends Paintings {
    public function toDescendStairs() {
        echo "Whoo hoo!";
    }
}

$reviews = new Reviews();
$reviews->toDescendStairs();








//