<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/8/2020
 * Time: 6:56 PM
 */
 
$nonce = uniqid();
header("Content-Security-Policy: default-src 'self' 'nonce-$nonce' ");

?>

<html lang="en">

<head>
    <title>Content Security Policy</title>
    <script nonce="<?= $nonce ?>">console.log(4444)</script>
</head>

<body>

<ul style="color: forestgreen; font-family: sans-serif;">
    <li>Cross</li>
    <li>Validation</li>
</ul>

</body>

</html>
