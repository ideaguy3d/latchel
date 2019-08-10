<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 7/21/2019
 * Time: 5:19 PM
 */

namespace Latchel;


class HomeController extends Controller
{
    public function index() {
        $posts = HomeController::getPosts('home');
        return $this->view('template', ['posts' => $posts]);
    }

    public static function getPosts($slug) {
        $posts = Post::where('slug', '=', $slug)->get();

        foreach ($posts as &$post) {
            $post->user = User::find($post->user_id);
        }

        // loop for "post" and "comments" data
        foreach ($posts as &$post) {
            $post->comments = Comment::where('post_id', '=', $post->post_id)->get();

            foreach ($post->comments as &$comment) {
                $comment->user = User::find($comment->user_id);
            }
        }

        return $posts;
    }
}