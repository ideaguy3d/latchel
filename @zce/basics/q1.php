<?php
declare(strict_types=1);
namespace myapp;
/**
 * Created by PhpStorm.
 * User: julius hernandez alvarado
 * Date: 5/8/2020
 * Time: 10:21 PM
 */

/*

1) A
2) A, C ?
3) D
4) A, C
5) B
6) A, C
7) C

*/

include './NamespaceOne.php';

echo "\n\n";

echo utils\hello\world();

echo "\n\n";

use myapp\utils\hello;
echo hello();

define('EMPTY', '');

//if(empty(EMPTY)) {
//    echo '...hmm';
//}



$debug = 1;























// end of file