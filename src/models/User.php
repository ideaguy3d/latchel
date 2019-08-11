<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 7/21/2019
 * Time: 5:16 PM
 */

namespace Latchel;


class User
{
    public static $data;

    private static $_instance = null;

    public static function find($postId) {
        //-- create a new "self" for static method chaining (:
        if(self::$_instance === null) {
            self::$_instance = new self;
        }

        $comments = Comment::get();

        if(!empty($comments)) {
            return Comment::$data;
        }

        return ['error' => 'no data for comment ~User.php L28'];
    }
}