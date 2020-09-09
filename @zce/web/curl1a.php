<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/20/2020
 * Time: 6:19 PM
 *
 * curl functions used:
 * 1. curl_init()
 * 2. curl_setopt()
 * 3. curl_error()
 * 4. curl_exec()
 * 5. curl_close()
 *
 */

$resource = "169.254.241.146/+sweetsecure/curl1b.php";

$curlResource = curl_init($resource);

$curlData = ['foo' => 'bar'];

curl_setopt($curlResource, CURLOPT_POST, true);
curl_setopt($curlResource, CURLOPT_POSTFIELDS, $curlData);

// should probably store in the output buffer
$response = curl_exec($curlResource);

$err = curl_error($curlResource);

curl_close($curlResource);

$log = "\n|\n|\n_> application response = $response\n\n";

echo $log;