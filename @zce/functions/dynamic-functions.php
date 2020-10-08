<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/6/2020
 * Time: 3:44 AM
 *
 * @param array $engineer
 */

$engineer = ['Julius', 'Alvarado', 'PHP'];
$_POST['v'] = (int)4.0;


// won't work, we can't use ! on a language construct / reserved keyword
/*if(!print weird(9)) {
    echo 'Alrighty!';
}*/

// Compiler / Parse Error
/*$lambda = function mode() {
    return 'hi';
};*/

//echo $w;

//lots_err($_POST['v']);
//add_values(1, 2, 3);
dataAnalystEngineer(...$engineer);
dataPipelineEngineer(...$engineer);
bigDataEngineer(...$engineer);
dataAutomationEngineer(...$engineer);

/*
    OUTPUT:
 - Julius Alvarado will use PHP for dataAnalystEngineer tasks for company

 - Julius Alvarado will use PHP for dataPipelineEngineer tasks for company

 - Julius Alvarado will use PHP for dataAnalystEngineer tasks for company

 - Julius Alvarado will use PHP for dataAutomationEngineer tasks for company
*/

function weird($x, &$y = 1, $z = null) {
    return $y += $x ?? $y ?? $z;
}

function add_values() {
    $sum = 0;
    for($i = 1; $i <= func_num_args(); $i++) {
        $sum += func_get_arg($i);
    }
    return $sum;
}

function lots_err(float $x): void {
    $x = 4.0;
    $x++;
    $x2 = $x ** 2;
    echo $x++ ** 2;
    //return $x;
}

function engEcho($first, $last, $tool, $task) {
    $f = "\n - %s %s will use %s for %s tasks at the company\n";
    printf($f, $first, $last, $tool, $task);
}


/* a few ways to make a function dynamic */

// scatter operator
function dataPipelineEngineer(...$engineer) {
    $first = $last = $tool = null;
    foreach($engineer as $k => $attr) {
        switch($k) {
            case 0:
                $first = $attr;
                break;
            case 1:
                $last = $attr;
                break;
            case 2:
                $tool = $attr;
                break;
        }
    }
    $m = __FUNCTION__;
    engEcho($first, $last, $tool, $m);
}

// func_get_arg()
function dataAnalystEngineer() {
    $first = func_get_arg(0);
    $last = func_get_arg(1);
    $tool = func_get_arg(2);
    $m = __FUNCTION__;
    engEcho($first, $last, $tool, $m);
}

// func_num_args()
function bigDataEngineer() {
    $max = func_num_args();
    $first = $last = $tool = null;
    for($i = 0; $i < $max; $i++) {
        if(0 === $i) $first = func_get_arg($i);
        else if(1 === $i) $last = func_get_arg($i);
        else $tool = func_get_arg($i);
    }
    $m = __FUNCTION__;
    engEcho($first, $last, $tool, $m);
}

// func_get_args()
function dataAutomationEngineer() {
    $engineer = func_get_args();
    [$first, $last, $tool] = $engineer;
    $m = __FUNCTION__;
    engEcho($first, $last, $tool, $m);
}
