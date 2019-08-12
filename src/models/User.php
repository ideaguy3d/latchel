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
    private static $_instance = null;

    /**
     * This version is more practical after doing tons of debugging
     * ... there is no need to get a previously initialized static field (even though it looks cool)
     *      since all I'm doing is emulating
     *
     * @param string $userId - this would be needed if this was real
     *
     * @return array|UserStruct
     */
    public static function find(string $userId): UserStruct {
        //-- create a new "self" for static method chaining (:
        if(self::$_instance === null) {
            self::$_instance = new self;
        }

        // so I could use an "->"
        return new UserStruct($userId);
    }

    /**
     * This version gets a static field that has been initialized from the Comment class
     *
     * @param string $postId
     * @param string $username
     *
     * @return array|UserStruct
     */
    public static function find2(string $postId, string $username): UserStruct {
        //-- create a new "self" for static method chaining (:
        if(self::$_instance === null) {
            self::$_instance = new self;
        }

        $comments = Comment::get();

        if(!empty($comments)) {
            return new UserStruct(Comment::$data);
        }

        return ['error' => 'no data for comment ~User.php L28'];
    }
}