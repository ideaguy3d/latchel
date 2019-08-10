<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 7/21/2019
 * Time: 5:16 PM
 */

namespace Latchel;


class Comment
{
    public static $data;

    // solution from "https://stackoverflow.com/questions/125268/chaining-static-methods-in-php"
    private static $_instance = null;

    public static function where($postId, $op, $id) {
        if (self::$_instance === null) {
            self::$_instance = new self;
        }

        return self::$_instance;
    }

    public static function get() {
        // create some mock data
        self::$data = [
            new CommentStruct(), new CommentStruct(), new CommentStruct(), new CommentStruct(), new CommentStruct()
        ];

        return self::$data;
    }
}