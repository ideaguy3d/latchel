<?php
/**
 * Created by PhpStorm.
 * User: julius hernandez alvarado
 * Date: 5/8/2020
 * Time: 10:30 PM
 */

namespace myapp\utils\hello
{
    function world () {
        return "\n_> Hello World\n";
    }
}

namespace myapp
{
    echo utils\hello\world();
    
    use myapp\utils\hello;
    echo hello\world();
}