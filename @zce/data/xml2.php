<?php

/* Practicing the DOMDocument class */

$htmlStr = file_get_contents('http://localhost/php-algorithm-prac/security-project/');

// xml
$domDoc = new DOMDocument();
$domDoc->load('data-formats\sample.xml');
// html
$htmlDoc = new DOMDocument();
$htmlDoc->load($htmlStr);
// do some ops
$domDoc->save('data-formats\saved-sample.xml');
$xmlStr = $domDoc->saveXML();
$htmlDocStr = $domDoc->saveHTML();
$domDoc->saveHTMLFile('data-formats\sample-xml.html');
//
$xpath = new DOMXPath($domDoc);
$elements = $xpath->query("//*[@id]");
echo "\n_> found {$elements->length} elements\n";
if(null !== $elements) {
    foreach($elements as $elem) {
        echo "\n" . $elem->nodeName;
    }
}

/*
// making sure PHP class's are case insensitive
class ONEClass
{
    public function __construct() {
        echo "\n\r _> ello elle \n\r";
    }
}

$o1 = new ONEClass();
$o2 = new OneClass();
*/