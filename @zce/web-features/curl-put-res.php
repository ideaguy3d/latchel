<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/21/2020
 * Time: 3:29 PM
 */
 

$putData = putOne();

function putOne (): array {
    $putVars = [];
    parse_str(file_get_contents("php://input"), $putVars);
    return $putVars;
}

function putTwo () {
    $data = [];
    parse_str(file_get_contents("php://input"), $data);
    return $data;
}


// end of php file