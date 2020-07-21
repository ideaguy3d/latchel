<?php declare(strict_types=1);
require('./SweetsCompleteDB.php');

$db = new \julius\SweetsCompleteDB();

$stateLookupQuery = 'select * from us_states where state_name = :state limit 1;';
$stateLookupStatement = $db->pdo->prepare($stateLookupQuery);

$output = '<table border="1">' . PHP_EOL;
$prospects = $db->pdo->query('select * from prospects limit 99;');

while($row = $prospects->fetch()) {
    $output .= '<tr><td>';
    $output .= implode('</td><td>', $row);
    $output .= '</td></tr>' . PHP_EOL;
}

$output .= '</table>' . PHP_EOL;
echo $output;