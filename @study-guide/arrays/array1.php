<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/17/2019
 * Time: 3:34 PM
 */


$jobData = ['pressure seal', 'converted', '1/0'];

// list construct prac
[$jobType, $paper, $color] = $jobData;
/*
//-- old way:
$jobType = $jobData[0];
$paper = $jobData[1];
$color = $jobData[2];
*/

echo "\n\nThe $jobType job is a $paper $color \n\n";

$info = [];
$infoMap = [];

[$info[0], $info[1], $info[2]] = $jobData;
[$infoMap['job_type'], $infoMap['paper'], $infoMap['color']] = $jobData;

$formattedVar = print_r($info, true);
$formattedVarMap = print_r($info, true);

echo $formattedVar;
echo "\n\n";
echo $formattedVarMap;


$break = 'point';





//