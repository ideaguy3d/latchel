<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/17/2019
 * Time: 3:34 PM
 */


// some base data to prac on
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

function n() {
  echo "\n\n--------------------------------------------\n\n";
};

// list prac
foreach ($jobData2 as [$a, $b, $c]) {
    n();
    echo "A: $a, B: $b";
}


//-- ArrayObject class prac --\\
$a = ['one', 'two'];
$b = ['two', 'three', 'four'];
$inv = ['n10_envelope' => 5000, 'brown_kraft_paper' => 10500, 'ink_jet_envelopes' => 3000];

$invObj = new ArrayObject($inv);

n();
// a php notice
var_dump($invObj->n10_envelope);

// fix the notice
$invObj->setFlags(ArrayObject::ARRAY_AS_PROPS);
n();
var_dump($invObj->n10_envelope);

n();
echo count($a + $b);
n();
//echo count($b - $a);

//-- diff prac --\\
$mandatoryKeys = ['email', 'password', 'token', 'username'];
$mockPostKeys = ['email', 'password',];
$mockPostKeys2 = ['username', 'password', 'email'];

$diff = array_diff($mandatoryKeys, $mockPostKeys, $mockPostKeys2);

$break = 'point';

//-- union prac --\\


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