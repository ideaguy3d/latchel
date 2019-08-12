<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 7/21/2019
 * Time: 5:19 PM
 */

namespace Latchel;

use Closure;


class HomeController extends Controller
{
    /**
     * @var array - AngularJS will iterate over this
     */
    private $posts;

    /**
     * @var string - the name of the folder the UI code lives in
     */
    private $appName = 'app';

    public function __construct() {
        $this->posts = HomeController::getPosts('home');
    }

    /**
     * return the home view
     *
     * @return Closure
     */
    public function index(): Closure {
        $break = 'point';
        return $this->view('template', $this->appName, $this->posts);
    }

    /**
     * @param $slug string
     *
     * @return array
     */
    public static function getPosts(string $slug): array {
        $posts = Post::where('slug', '=', $slug)->get();

        foreach ($posts as $post) {
            $post->comments = Comment::where('post_id', '=', $post->post_id)::get();
            // create a mock user id, comments should always be an array of standard classes
            $userId = $post->comments::$data[0]->user;
            $post->user = User::find($userId);

            //TODO: refactor to a built-in array iterator function
            foreach ($post->comments as &$comment) {
                $comment->user = User::find($userId);
            }
        }

        return $posts;
    }
}