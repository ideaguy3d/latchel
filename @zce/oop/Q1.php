<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 7/30/2020
 * Time: 12:10 PM
 */

namespace Ceptro
{
    trait TestOne
    {
        public string $test = '1st test';
    
        public function getTest() {
            return $this->test;
        }
    }
    class Magic
    {
        public $a = 'A';
        protected $b = ['a' => 'A', 'b' => 'B', 'c' => 'C'];
        protected $c = [1, 2, 3];
        
        public function __get($name) {
            echo "$name";
            return $this->b[$name];
        }
    }
    
    $em = new Magic();
    echo $em->a . ", ";
    echo $em->b . ", ";
    echo $em->a . ", " . $em->b . ", " . $em->c;
    $debug = 1;
}

namespace
{
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
        
        abstract function filterSet(int $threshold): array;
    }
    
    class IotaTwoSet extends IotaSet
    {
        function filterSet(int $threshold): array {
            return ['filtered'];
        }
    }
    
    function filterCep(IotaSet $set) {
        return 'success';
    }
    
    $set = new IotaTwoSet([12, 3, 4]);
    
    filterCep($set);
    
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
}