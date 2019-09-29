<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/17/2019
 * Time: 3:34 PM
 */

//-- diff prac --\\
$mandatoryKeys = ['email', 'password', 'token', 'username'];
$mockPostKeys = ['email', 'password',];
$mockPostKeys2 = ['username', 'password', 'email'];

$diff = array_diff($mandatoryKeys, $mockPostKeys, $mockPostKeys2);

$break = 'point';

//-- union prac --\\
$jobData = [
    ['job_type', 'seal_type', 'color'],
    ['pressure seal', 'converted', '1/0'],
    ['post card', 'n/a', '1/4'],
    ['self mailer', 'n/a', '4/0']
];

$jobData2 = [
    ['job_type', 'seal_type', 'color'],
    ['letter', 'n/a', '1/0'],
    ['letter', 'n/a', '1/0'],
    ['flat', 'n/a', '1/0']
];

$jobRec = ['pressure seal', 'converted', '1/0'];

//$jobDataUnion = $jobData + $jobData2;
$jobDataUnion2 = array_merge($jobData, array_slice($jobData2, 1));

// list construct prac
[$jobType, $paper, $color] = $jobData;

/*
// -- old way --
$jobType = $jobData[0];
$paper = $jobData[1];
$color = $jobData[2];
*/

//echo "\n\nThe $jobType job is a $paper $color \n\n";

$info = [];
$infoMap = [];

[$info[0], $info[1], $info[2]] = $jobData;
[$infoMap['job_type'], $infoMap['paper'], $infoMap['color']] = $jobData;

$formattedVar = print_r($info, true);
$formattedVarMap = print_r($infoMap, true);

/*
echo $formattedVar;
echo "\n\n";
echo $formattedVarMap;
*/


$break = 'point';





//