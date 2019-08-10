<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/10/2019
 * Time: 3:21 PM
 */

namespace Latchel;


class PostStruct
{
    public $post_id;
    public $user_id;
    public $comments;

    public function __construct($post_id, $user_id) {
        $this->post_id = $post_id;
        $this->user_id = $user_id;

        $this->comments = [
            ''
        ];
    }
}