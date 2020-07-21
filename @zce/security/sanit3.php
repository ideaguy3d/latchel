<?php

$contents = file_get_contents('http://en.wikipedia.org/wiki/php');


$phase2 = preg_replace(
    ['#<script#', '#</script>#', '#<a href="(.*?)"(.*?)>#'],
    ['<!-- ', ' -->', '<span style="font-size: 8pt; font-style: italics;">[$1]</span>',],
    $contents
);

echo $phase2;