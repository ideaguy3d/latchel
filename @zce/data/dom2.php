<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/26/2020
 * Time: 1:55 PM
 *
 * -- simple var names --
 * foo, bar, one, two, six, ten, per, cep, tron
 *
 ** Primary methods/props/classes:
 * new DOMDocument($version, $encode)
 * new DOMXPath()
 * ->save()
 * ->createElement()
 * ->appendChild()
 * ->formatOutput "get|set"
 * ->saveXML()
 * ->nodeName "get|set"
 * ->childNodes
 */


$dom = new DOMDocument('1.0', 'UTF-8');
$dom->load('data-formats/xml-xsl/movies.xml');

// convert to an in-memory XML string
$domXmlStr = $dom->saveXML();
// convert to an in-memory HTML string
$domHtmlStr = $dom->saveHTML();
// save as HTML to a file
$dom->saveHTMLFile('data-formats/movies-xml.html');

// start querying the XML
$xpath = new DOMXPath($dom);
// returns a "DOMNodeList" obj
$elems = $xpath->query("//*[@id]");
//echoXpathQuery($elems);

$langs = ['C', 'PHP', 'JS', 'SQL', 'C#'];
$domLangs = new DOMDocument('1.0', 'UTF-8');
$domLangs->formatOutput = true;
$xml_to_create = '
<?xml version="1.0"?>
<top-languages>
    <language rank="1">C</language>
    <language rank="2">PHP</language>
    <language rank="3">JS</language>
    <language rank="4">SQL</language>
    <language rank="5">C#</language>
</top-languages>
';

// create root elem, then add to DOM
$rootLang = $domLangs->createElement('top-languages');
$domLangs->appendChild($rootLang);

// create title, then add to root
$title = $domLangs->createElement('title');
$rootLang->appendChild($title);

// create a text node, then add the title
$text = $domLangs->createTextNode('Top Programming Languages for 2021 and beyond.');
$title->appendChild($text);

addLangs($rootLang, $domLangs, $langs);
//$domLangs->save('data-formats/xml-xsl/top-langs-2021.xml');

$debug = 1;

//----------------------------------------------------------------------------------------------------

function addLangs(&$elem, $dom, $langs) {
    // INIT starting length of $langs array
    static $len = null;
    $len = $len ?? count($langs);
    
    // add lang to XML
    $lang = array_shift($langs);
    $langElem = $dom->createElement('language', $lang);
    $langElem->setAttribute('rank', $len - count($langs));
    $elem->appendChild($langElem);
    
    // recursion
    if(!empty($langs)) return addLangs($elem, $dom, $langs);
    return null;
}

function echoXpathQuery ($elems) {
    if(!is_null($elems)) {
        // elem is a "DOMElement" obj
        foreach($elems as $elem) {
            echo "\n__> $elem->nodeName:\n";
            $nodes = $elem->childNodes;
            foreach($nodes as $node) {
                echo "$node->nodeValue";
            }
        }
    }
}
