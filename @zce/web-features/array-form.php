<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/14/2020
 * Time: 7:10 PM
 */
 
// using array notation in the input field name
$sale = $_POST['sale'];
/*
    $sale = [
        'price'=> 9.99,
        'qty' => 2
    ];
*/

// can use array notation to set cookies
setcookie('sale[product]', 'course');
setcookie('sale[username]', 'foo@bar.com');
/*
    ['sid' => 'abc123', 'sale' => ['product' => 'course', 'username' => 'foo@bar.com']]
*/

?>

<html lang="en">

<body>
<form action="" method="post">
    <input type="number" name="sale[qty]">
    <input type="number" name="sale[price]">
    <input type="submit">
</form>
</body>

</html>
