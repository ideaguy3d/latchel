<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/25/2020
 * Time: 12:33 PM
 *
 **** Functions used ****
 * new DomDocument()
 * new DomElement()
 * ->appendChild()
 * ->createElement()
 * ->formatOutput = true;
 * ->saveXML()
 */

header('Content-Type: application/xml');

$cdList = [
    ['title' => 'Trance', 'artist' => 'DJ Gogo', 'year' => 2015],
    ['title' => 'Techno', 'artist' => 'TiestoX', 'year' => 2019],
    ['title' => 'Big Room House', 'artist' => 'Electro1', 'year' => 2019],
    ['title' => 'Happy Hardcore', 'artist' => 'DJ Cotts', 'year' => 2017],
];

xmlTwo($cdList);

function xmlOne () {
    try {
        // root
        $dom = new DOMDocument('1.0', 'UTF-8');
        $root = $dom->appendChild($dom->createElement('Movies'));
        
        // child elem's
        $movie = new DOMElement('movie');
        $title = new DOMElement('title', 'A History of');
        
        $root->appendChild($movie)->appendChild($title);
        
        $movie->appendChild(new DOMElement('year', '2005'));
        $movie->appendChild(new DOMElement('country', 'USA'));
        $movie->appendChild(new DOMElement('genre', 'crime'));
        
        $director = new DOMElement('director');
        $movie->appendChild($director);
        
        $director->appendChild(new DOMElement('first_name', 'Joe'));
        $director->appendChild(new DOMElement('last_name', 'Shmoe'));
        $director->appendChild(new DOMElement('birth_date', 1970));
        
        // root, format&output
        $dom->formatOutput = true;
        $xmlOutput = $dom->saveXML();
        
        //file_put_contents('movies.xml', $xmlOutput);
        echo $xmlOutput;
    }
    catch(Throwable $e) {
        echo $e->getMessage();
    }
}

function xmlTwo ($cds) {
    $dom = new DOMDocument('1.0','UTF-8');
    $collection = $dom->createElement('collection');
    $dom->appendChild($collection);
    
    foreach($cds as $cd) {
        $cdNode = $dom->createElement('cd');
        foreach($cd as $name => $value) {
            $cdNode->appendChild($dom->createElement($name, $value));
        }
        $collection->appendChild($cdNode);
        unset($cdNode);
    }
    
    $dom->formatOutput = true;
    $output = $dom->saveXML();
    file_put_contents('cd-list.xml', $output);
    $debug = 1;
}
