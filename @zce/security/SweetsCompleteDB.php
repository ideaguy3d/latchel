<?php declare(strict_types=1);

namespace julius;

use PDO;

class SweetsCompleteDB
{
    public PDO $pdo;
    
    public function __construct() {
        $this->pdo = new PDO(
            'mysql:host=127.0.0.1;dbname=sweetscomplete;', 'root', '', [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]
        );
    }
}