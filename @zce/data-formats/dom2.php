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

$langs = ['C', 'PHP', 'JS', 'SQL', 'C#'];
$domLangs = new DOMDocument('1.0', 'UTF-8');
$domLangs->formatOutput = true;
$xml_to_create = '
<?xml version="1.0"?>
<top-languages>
    <language>C</language>
    <language>PHP</language>
    <language>JS</language>
    <language>SQL</language>
    <language>C#</language>
</top-languages>
';

$rootLang = $domLangs->createElement('top-languages');
$domLangs->appendChild($rootLang);
addLangs($rootLang, $domLangs, $langs);
$domLangs->save('data-formats/xml-xsl/top-langs.xml');

$debug = 1;

//----------------------------------------------------------------------------------------------------

function addLangs(&$elem, $dom, $langs) {
    $lang = array_shift($langs);
    $elem->appendChild($dom->createElement('language', $lang));
    if(!empty($langs)) return addLangs($elem, $dom, $langs);
    return null;
}


