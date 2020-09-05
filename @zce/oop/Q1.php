<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 7/30/2020
 * Time: 12:10 PM
 */

class OneQuick
{
    public string $stat = 'one';
    
    public function __serialize(): array {
        $this->stat = 'two';
        
        // Must return an array
        return ['stat' => $this->stat];
    }
    
    public function __unserialize(array $data) {
        $this->stat = $data['stat'];
    }
}

$obj = unserialize(serialize(new OneQuick()));

abstract class IotaSet
{
    protected array $set;
    
    public function __construct($set) {
        $this->set = $set;
    }
    
    abstract function filterSet(): array;
}

class IotaTwoSet extends IotaSet
{
    function filterSet(): array {
        return array_filter($this->set, fn($e) => $e > 10);
    }
}


final class Perceptron
{
    private static $per;
    
    public static function getPerceptron() {
        if(!self::$per) {
            self::$per = new self();
        }
        return self::$per;
    }
    
    private function __construct() {
        try {
            $this->pdo = new PDO(
                'mysql:host=localhost;dbname=hack_match;', 'root', '',
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        }
        catch(Exception $e) {
            $ml = __METHOD__ . ' line: ' . __LINE__;
            exit ($e->getMessage() . "~$ml");
        }
    }
}

$per = Perceptron::getPerceptron();

$per2 = Perceptron::getPerceptron();

$per3 = Perceptron::getPerceptron();

$debug = 1;