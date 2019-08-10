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
    private static $data;
    // from "https://stackoverflow.com/questions/125268/chaining-static-methods-in-php"
    private static $_instance = null;

    /**
     * none of the function params are getting used, in a real framework
     * I'm sure they would be intermixed w/SQL, but I'm just trying to emulate
     *
     * @param $type
     * @param $op
     * @param $slug
     *
     * @return Post|null
     */
    public static function where($type, $op, $slug) {
        $break = 'point';

        self::$data = [
            new PostStruct(99992, 11112),
            new PostStruct(99993, 11113),
            new PostStruct(99994, 11114)
        ];

        if(self::$_instance === null) {
            self::$_instance = new self;
        }

        return self::$_instance;
    }

    public static function get() {
        return self::$data;
    }
}