<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/3/2020
 * Time: 8:27 PM
 */

namespace zce\basics2\julius;

const ANALYSIS = 'Analysis';
const ENGINEERING = 'Engineering';
const DATA = 'Data';
const DATA_FIELDS = [ANALYSIS => true, ENGINEERING => true];

$phpUsage = "\n--PHP can be used for %s %s";

constantsRecursion($phpUsage);

function numberRepresentations() {
    // binary has leading zero b
    $b_num = 0b0110;
    $b2_num = 0b0001;
    $b_sum = $b_num + $b2_num; // 7
    
    // octal has leading zero
    $o_num = 011;
    $o2_num = 012;
    $o_sum = $o_num + $o2_num; // 19
    
    // hexadecimal has leading zero x
    $x_num = 0x9F8; // 2552
    $x2_num = 0x2c5; // 709
    $x_sum = $x_num + $x2_num; // 3261
    
    // exponential
    $e_num = 0.137259e6; // 137259
    $e2_num = 0.99528e5; // 99528
    $e_sum = $e_num - $e2_num; // 37731
    
    echo "\n\n_> $b_num + $b2_num = $b_sum";
    echo "\n\n_> $o_num + $o2_num = $o_sum";
    echo "\n\n_> $x_num + $x2_num = $x_sum";
    echo "\n\n_> $e_num - $e2_num = $e_sum";
}

function constantsIteration (string $phpUsage) {
    foreach(DATA_FIELDS as $k => $v) {
        if($v) printf($phpUsage, DATA, $k);
    }
}

function constantsRecursion (string $phpUsage) {
    static $i = 0;
    $k = array_keys(DATA_FIELDS)[$i];
    if(DATA_FIELDS[$k]) printf($phpUsage, DATA, $k);
    
    if(++$i < count(DATA_FIELDS)) return constantsRecursion($phpUsage);
    return null;
}


echo "\n\n";