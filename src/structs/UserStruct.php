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

    public function __construct(string $username = null, array $comments = null) {
        if($comments) $this->name = $comments[0]->user;
        else {
            $username = preg_replace("/\w+:\s+/", '', $username);
            $this->name = $username;
        }
    }
}