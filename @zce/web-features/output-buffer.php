<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/14/2020
 * Time: 10:40 PM
 */

ob_start(function($output) {
    if(false !== strpos($output, '<')) return htmlentities($output);
    return $output;
});

echo "\nEllo\n";
echo "\n<sript>alert(4444)<script/>\n";
echo "\nWorld\n";
for($i = 0; $i < 10; $i++) {
    if($i % 2 === 0) echo "\ni = $i\n";
    else if (0===$i) echo "\nzero\n";
    sleep(1);
    ob_flush();
}

echo "\n^_^/\n";

$debug = 1;