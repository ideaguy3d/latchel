<?php declare(strict_types=1);

/* transform a xml file using xsl */

if(PHP_SAPI == 'cli') {
    $sdocFile = 'data-formats/style.xsl';
    $xdocFile = 'data-formats/sample.xml';
}
else {
    $sdocFile = './style.xsl';
    $xdocFile = './sample.xml';
}

// load the xsl
$sdoc = new DOMDocument();
$sdoc->load($sdocFile);

// load the xml
$xdoc = new DOMDocument();
$xdoc->load($xdocFile);

// combine the xsl and xml
$xtran = new \XSLTProcessor();
$xtran->importStylesheet($sdoc);

echo $xtran->transformToXml($xdoc);













// end of PHP file