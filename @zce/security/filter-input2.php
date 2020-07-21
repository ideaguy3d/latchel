<?php declare(strict_types=1);
require('./SweetsCompleteDB.php');

$db = (new \julius\SweetsCompleteDB())->pdo;


$stateLookupQuery = 'select * from us_states where state_name = :state limit 1;';
$stateLookupStatement = $db->prepare($stateLookupQuery);

$output = '<h1>recursive loop</h1> <table border="1">' . PHP_EOL;
$prospects = $db->query('select * from prospects limit 19;');
prospectsRecursiveLoop($prospects->fetch());

// 1st loop does no validation or sanitation
//while($row = $prospects->fetch()) {
//    $output .= '<tr><td>';
//    $output .= implode('</td><td>', $row);
//    $output .= '</td></tr>' . PHP_EOL;
//}

function prospectsRecursiveLoop (array $row): void {
    global $output;
    global $prospects;
    
    $output .= '<tr><td>';
    $output .= implode('</td><td>', $row);
    $output .= '</td></tr>' . PHP_EOL;
    
    if($row = $prospects->fetch()) prospectsRecursiveLoop($row);
}

$output .= '</table>' . PHP_EOL;
echo $output;