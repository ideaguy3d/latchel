<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/10/2019
 * Time: 4:07 PM
 */

namespace Latchel;


/**
 * Class UserStruct - same idea as C# structs
 *
 * @package Latchel
 */
class UserStruct
{
    public $name;
    public $comments;

    public function __construct($comments) {
        $this->name = $comments[0]->user;
        $this->comments = $comments;
    }
}