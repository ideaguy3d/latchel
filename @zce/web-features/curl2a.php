<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/21/2020
 * Time: 12:53 PM
 *
 * 1, curl_init()
 * 2, curl_setopt()
 * 3, curl_exec()
 * 4, curl_error()
 * 5, curl_close()
 *
 */

$resource = "169.254.241.146/+sweetsecure/curl1c.php";
$c_data = ['model' => '^Perceptron++'];
$c_data = ['foo' => '^Foo++'];

$c_resource = curl_init($resource);

curl_setopt($c_resource, CURLOPT_POST, true);
curl_setopt($c_resource, CURLOPT_POSTFIELDS, $c_data);

$r = curl_exec($c_resource);

$er = curl_error($c_resource);

curl_close($c_resource);


 


// end of php file