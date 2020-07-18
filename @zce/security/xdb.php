<?php

echo "_> Starting Script... ";

try {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=lara1', 'root', '');
    $q = "insert into post2b (body) values ('%s')";
    
    if($_POST['description'] ?? null) {
        $data = $_POST['description'];
        $q = sprintf($q, $data);
        //$pdo->prepare($q)->execute();
        $pdo->exec($q);
        echo '_> SUCCESS - inserted data';
    }
    else if($_GET['post'] ?? null) {
        $data = $_GET['post'];
        $q = sprintf($q, $data);
        $pdo->exec($q);
        echo '_> SUCCESS - inserted data';
    }
    else {
        echo '_> No data inserted :/';
    }
}
catch(\Throwable $e) {
    echo '_> ERROR: ' . $e->getMessage();
}
