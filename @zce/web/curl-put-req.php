<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/21/2020
 * Time: 3:26 PM
 */

$url = '169.254.241.146/+sweetsecure/curl1c.php';

$data = ['per' => '^Per++'];

$c_handle = curl_init();

$c_opts = [
    CURLOPT_URL => $url, CURLOPT_CUSTOMREQUEST => 'PUT', CURLOPT_POSTFIELDS => $data
];

curl_setopt_array($c_handle, $c_opts);

// returns a bool
$r = curl_exec($c_handle);





// end of php file