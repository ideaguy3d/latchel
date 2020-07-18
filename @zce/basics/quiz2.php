<?php

/*

1. A
x2. A, C
3. D
4. C, D
5. B
6. A, C
x7. B

*/

define('CONSTANT', 1);
define('_CONSTANT', 0);
define('EMPTY', '');

/*if(!empty(EMPTY)) {
    if(!((boolean)_CONSTANT)) {
        echo 'one';
    }
}*/


namespace myapp\utils\hello {
    function world() {
        echo 'Ello Earth';
    }
}

namespace myapp {
    use utils\hello\world;
    
    function h1() {
        echo myapp\utils\hello\world();
    }
    
    function h2() {
        echo world();
    }
}

myapp\h1();




$debug = 1;




// end of file