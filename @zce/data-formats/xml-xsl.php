<?php declare(strict_types=1);

//header('Content-type: application/xml');

/* transform a xml file using xsl */

if(PHP_SAPI == 'cli') {
    $sdocFile = 'data-formats/xml-xsl/b-fruits.xsl';
    $xdocFile = 'data-formats/xml-xsl/b-fruits.xml';
}
else {
    $sdocFile = './xml-xsl/b-fruits.xsl';
    $xdocFile = './xml-xsl/b-fruits.xml';
}

cdList();

function fruits () {
    $sdocFile = 'data-formats/xml-xsl/b-fruits.xsl';
    $xdocFile = 'data-formats/xml-xsl/b-fruits.xml';
    
    // load the xml
    $xml_doc = new DOMDocument();
    $xml_doc->load($xdocFile);

    // load the xsl
    $xsl_doc = new DOMDocument();
    $xsl_doc->load($sdocFile);

    // combine the xsl and xml
    $xsl = new XSLTProcessor();
    
    libxml_use_internal_errors(true);
    $r = $xsl->importStylesheet($xsl_doc);
    if(!$r) foreach(libxml_get_errors() as $error) echo "xmlError: {$error->message}";
    libxml_use_internal_errors(false);
    
    echo $xsl->transformToXml($xml_doc);
}

function cdList () {
    $sdocFile = 'data-formats/xml-xsl/cd-list.xsl';
    $xdocFile = 'data-formats/xml-xsl/cd-list.xml';
    
    // load the xml
    $xml_doc = new DOMDocument();
    $xml_doc->load($xdocFile);
    
    // load the xsl
    $xsl_doc = new DOMDocument();
    $xsl_doc->load($sdocFile);
    
    // combine the xsl and xml
    $xsl = new XSLTProcessor();
    
    libxml_use_internal_errors(true);
    $r = $xsl->importStylesheet($xsl_doc);
    if(!$r) foreach(libxml_get_errors() as $error) echo "xmlError: {$error->message}";
    libxml_use_internal_errors(false);
    
    echo $xsl->transformToXml($xml_doc);
}