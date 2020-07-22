<?php

$contents = file_get_contents('http://en.wikipedia.org/wiki/php');

// preg_replace() take requires more processing power than str_replace() so it's
// better not to use it in a lengthy loop
$phase2 = preg_replace(
    ['#<script#u', '#</script>#u', '#<a href="(.*?)"(.*?)>#u'],
    ['<!-- ', ' -->', '<span style="font-size: 8pt; font-style: italics;">[$1]</span>',],
    $contents
);

echo $phase2;