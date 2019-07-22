<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 7/21/2019
 * Time: 5:16 PM
 */

namespace Latchel;


class Post
{
    public $post_id;
    public $html;
    private static $result = ['fields'];

    // from "https://stackoverflow.com/questions/125268/chaining-static-methods-in-php"
    private static $_instance = null;

    public static function where($type, $op, $slug) {
        if(self::$_instance === null) {
            self::$_instance = new self;
        }
        return self::$_instance;
    }

    public static function get() {
        return Post::$result;
    }
}