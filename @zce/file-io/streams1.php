<?php /** @noinspection PhpMissingFieldTypeInspection */
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/20/2020
 * Time: 4:39 PM
 */


echo "\n\n> stream wrappers:\n\n";


class StreamDB
{
    const TABLE = 'DataStream';
    protected $statement, $position, $data, $url, $id, $exists;
    
    public function stream_open($url, $mode) {
        $this->position = 0;
        $url = parse_url($url);
        $path = explode('/', $url['path']);
        $this->id = (int)$path[2];
        $table = static::TABLE;
        $id = $this->id;
        
        try {
            $dsn = "mysql:host={$url['host']};dbname={$path[1]}";
            $pdo = new PDO($dsn, $url['user'], $url['pass'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        }
        catch(Exception $e) {
            exit($e->getMessage());
        }
        
        switch($mode) {
            case 'w':
                $check = $pdo->prepare("select id from $table where id = $id");
                $check->execute();
                if($check->fetch()) {
                    $this->exists = true;
                    $this->statement = $pdo->prepare("update $table set data=?, date=? where id=$id");
                }
                else {
                    $this->statement = $pdo->prepare("insert into $table values ($id, ?, now())");
                }
                return true;
            case 'r':
                $this->statement = $pdo->prepare("select * from $table where id = $id");
                return true;
        }
        return false;
    }
    
    public function stream_write() {
    
    }
    
    public function stream_read() {
    
    }
    
    public function stream_tell() {
    
    }
    
    public function stream_eof() {
    
    }
}


// end of php file