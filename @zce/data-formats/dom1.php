<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/25/2020
 * Time: 12:33 PM
 *
 **** Functions used ****
 * new DomDocument()
 * appendChild()
 * createElement()
 */

(function() {
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
        file_put_contents('movies.xml', $xmlOutput);
    }
    catch(Throwable $e) {
        echo $e->getMessage();
    }
})();

