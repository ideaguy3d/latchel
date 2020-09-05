<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/4/2020
 * Time: 6:24 PM
 */
 
chdir('oop/data');

$dim = new DimensionDelegator();
foreach($dim->getDimensions() as $item) {
    
}


//-----------------------------------------------------------------------
function echoStream () {
    $dataStream = streamData();
    foreach($dataStream as $data) {
        $dataExport = var_export($data, true);
        echo "\n_> $dataExport\n";
    }
}

function streamData () {
    $stream = fopen('acc-sales.csv', 'r+');
    while(!feof($stream)) yield fgetcsv($stream);
    fclose($stream);
}

class DimensionDelegator
{
    protected array $widths = [5,10,20];
    protected array $lengths = [15, 20, 35];
    
    protected function getWidths() {
        foreach($this->widths as $width) yield $width;
    }
    
    protected function getLengths() {
        foreach($this->lengths as $length) yield $length;
    }
    
    public function getDimensions() {
        yield from $this->getLengths();
        // how do I know I've gone from yielding from length to width
        yield from $this->getWidths();
    }
}