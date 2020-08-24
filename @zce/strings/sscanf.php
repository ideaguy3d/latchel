<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/24/2020
 * Time: 4:10 PM
 */

(function(){
    
    [$ein] = sscanf("EIN/333444422", "EIN/%d");
    
    [$month, $day, $year] = sscanf("Aug 25 2020", "%s %d %d");
    
    $coder = '31\tJay Hernandez';
    
    [$age, $first, $last] = sscanf($coder, '%d\t%s %s');
    
    $debug = 1;
    
})();