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
    public static $result = ['fields'];

    // solution from "https://stackoverflow.com/questions/125268/chaining-static-methods-in-php"
    private static $_instance = null;

    public static function where($postId, $op, $id) {

        Comment::$result .= $postId;
    }

    public static function get() {
        return Comment::$result;
    }
}