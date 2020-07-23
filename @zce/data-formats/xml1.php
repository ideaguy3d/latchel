<?php declare(strict_types=1);

/* transform a xml file using xsl */

// load the xsl
$sdoc = new DOMDocument();
$sdoc->load('./style.xsl');

// load the xml
$xdoc = new DOMDocument();
$xdoc->load('./sample.xml');

// combine the xsl and xml
$xtran = new XSLTProcessor();
$xtran->importStylesheet($sdoc);
echo $xtran->transformToXml($xdoc);













// end of PHP file