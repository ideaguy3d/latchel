<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/17/2019
 * Time: 3:35 PM
 */


// encoding / multi byte / char output prac

//newOffset();
echo basic2();


function basic1() {
    $start = hrtime();
    $per = "\u{1F418}"; // a cute lil elephpant 🐘
    $dim = file_get_contents('me.png');
    $cep = 'hello solar system';
    $end = hrtime()[1] / $start[1];
    
    $mb_dim = mb_detect_encoding($dim);
    $mb_cep = mb_detect_encoding($cep);
    $mb_per = mb_detect_encoding($per);
    
    $debug = 1;
}

function basic2() {
    static $ways = [
        'emoji' => "\u{1F44B}",
        'latinChars' => "Hello",
        'accentedChars' => "ça va?",
    ];
    
    $method = array_key_first($ways);
    $enc = array_shift($ways);
    $encode = mb_detect_encoding($enc, ['ASCII', 'UTF-8', 'ISO-8859-1']);
    $strLen = strlen($enc);
    $strMbLen = mb_strlen($enc);
    $firstChar = $enc[0];
    
    if(!empty($ways)) {
       basic2(); // return
    }

    $r = "\n -$method: $enc \n -$encode \n -len: $strLen, $strMbLen \n -char1: $firstChar\n";
    $debug = "$r[0], $r[5]";
    
    // **Recurse_Point** \\
    return $r;
}

function newOffset() {
    $v = new StrArrayAccess('Perceptron');
    
    // now it works
    $v[-1] = '';
    
    // now it works
    unset($v[-1]);
}

function oldOffset() {
    $v = 'Perceptron';
    $v = substr_replace($v, '', -1, 1);
    
    // won't work
    $v[-1] = '';
    
    // won't work and fatal error
    unset($v[-1]);
}






// end of file