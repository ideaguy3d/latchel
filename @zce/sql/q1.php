<?php

try {
    $pdo = new PDO(
        'mysql:host=localhost;dbname=hack_match', 'root', '',
        [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
    );
    
    $sql = 'select name, pos from test_one where pos < 10';
    $sql = 'select :col from tests_one where name = :name';
    $sql1 = "insert into test_one (name, pos) values ('michelle', 4)";
    $sqlCount = "select count(*) from test_one";
    
    $prepare = function() use ($pdo, $sql) {
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':col', 'COUNT(name)');
        $statement->bindValue(':name', 'julius');
        $statement->execute();
        $results = $statement->fetchAll();
        var_dump($results);
        $debug = 1;
    };
    
    $transaction = function(PDO $pdo, $sql1, $sql2) {
        $pdo->beginTransaction();
        $pdo->query($sql1);
        $statement = $pdo->query($sql2);
        $numRows = $statement->fetchColumn();
        $pdo->rollback();
        $statement = $pdo->query($sql2);
        $numRows2 = $statement->fetchColumn();
        $debug  = 1;
        echo "\n_> numRows = $numRows, numRows2 = $numRows2\n";
    };
    
    $transaction($pdo, $sql1, $sqlCount);
}
catch(PDOException $e) {
    exit ("__>> PDO_EXCEPTION:\n\n" . $e->getMessage());
}
catch(Exception $e) {
    exit("__>> EXCEPTION: \n\n" . $e->getMessage());
}

