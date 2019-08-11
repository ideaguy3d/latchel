<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/10/2019
 * Time: 3:21 PM
 */

namespace Latchel;

/**
 * Class PostStruct - same idea as C# structs
 *
 * @package Latchel
 */
class PostStruct
{
    public $post_id;
    public $user_id;
    public $comments;
    public $html;

    public function __construct($post_id, $user_id) {
        $this->post_id = $post_id;
        $this->user_id = $user_id;
        $this->html = "<p>Ello World ^_^/</p>";
    }
}