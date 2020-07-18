<?php

echo 'hi';

$pdo = new PDO('mysql:host=localhost;dbname=lara1', 'root', '');
$debug = 1;

?>
<html lang="en">
<body>

<form action="./xdb.php" method="post">
    <label for="description">Product Description</label>
    <input type="text" id="description" name="description">
    <button>submit</button>
</form>

</body>
</html>
