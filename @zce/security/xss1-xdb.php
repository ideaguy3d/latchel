<?php

echo "_> Starting Script... ";

try {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=lara1', 'root', '');
    $q = "insert into post2b (body) values ('%s')";
    $success = function() { echo '_> SUCCESS - inserted data'; };
    
    if($_POST['description'] ?? null) {
        $data = $_POST['description'];
        $pdo->exec(sprintf($q, $data));
        $success();
    }
    else if($_GET['post'] ?? null) {
        $data = $_GET['post'];
        $pdo->exec(sprintf($q, $data));
        $success();
    }
    else {
        echo '_> No data inserted :/';
    }
}
catch(\Throwable $e) {
    echo '_> ERROR: ' . $e->getMessage();
}
