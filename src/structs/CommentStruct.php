<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/10/2019
 * Time: 3:39 PM
 */

namespace Latchel;

/**
 * Class CommentStruct - same idea as C# structs
 *
 * @package Latchel
 */
class CommentStruct
{
    /**
     * @var string - mock user
     */
    public $user;

    /**
     * @var string - mock id
     */
    public $user_id;

    /**
     * @var array - just mock data
     */
    private $random_names = [
        'Julius', 'Michelle', 'Michael', 'Julie', 'Julissa', 'Lucy', 'Lewis', 'Heather', 'Randy', 'Richard',
        'Lindsey', 'Rebbecca', 'Ray', 'Andy', 'Ashley', 'Travis', 'Jennifer', 'Carolyn', 'Angelina', 'Josh'
    ];

    public function __construct() {
        $max = (count($this->random_names) - 1);
        $r = rand();
        $rn = $this->random_names[rand(0, $max)];
        $this->user = "user: $rn";
        $this->user_id = "id: $r";
    }
}