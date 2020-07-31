<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 7/31/2020
 * Time: 10:03 AM
 */


class StrArrayAccess implements ArrayAccess
{
    public string $str;
    
    public function __construct(string $str) {
        $this->str = $str;
    }
    
    /**
     * @param int $offset
     *
     * @return bool|string|null
     */
    public function offsetExists($offset) {
        $str = $this->str ?? null;
        return is_null($str) ? null : $str;
    }
    
    public function offsetGet($offset) {
        // TODO: Implement offsetGet() method.
        $str = $this->str[$offset] ?? null;
        return is_null($str) ? null : $str;
    }
    
    /**
     * @param int $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value) {
        $this->emptyOrUnsetStrHandler($offset, $value);
    }
    
    public function offsetUnset($offset) {
        $this->emptyOrUnsetStrHandler($offset);
    }
    
    private function emptyOrUnsetStrHandler(int $offset, $value = '') {
        //TODO: implement exception handling
        if($value == '' || $value == "") {
            $this->str = substr_replace($this->str, $value, $offset, 1);
        }
        else {
            $this->str[$offset] = $value;
        }
    }
}