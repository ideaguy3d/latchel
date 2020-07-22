<?php declare(strict_types=1);
//$dbPath = (PHP_SAPI == 'cli') ? 'SweetsCompleteDB.php' : './SweetsCompleteDB.php';
//require($dbPath);

if(PHP_SAPI == 'cli') {
    require ('SweetsCompleteDB.php');
}
else {
    require ('./SweetsCompleteDB.php');
}

$db = (new \julius\SweetsCompleteDB())->pdo;


$stateLookupQuery = 'select * from us_states where state_name = :state limit 1;';
$stateLookupStatement = $db->prepare($stateLookupQuery);

$output = '<h1>recursive loop 2</h1> <table border="1">' . PHP_EOL;
$prospects = $db->query('select * from prospects limit 22;');
$r1 = $prospects->fetch();

if(false) prospectsRecursiveLoop($r1);
else sanitizedProspectRecursiveLoop($r1);

// 1st loop does no validation/sanitation
function prospectsRecursiveLoop(array $row): void {
    global $output;
    global $prospects;
    
    $output .= '<tr><td>';
    $output .= implode('</td><td>', $row);
    $output .= '</td></tr>' . PHP_EOL;
    
    if($row = $prospects->fetch()) prospectsRecursiveLoop($row);
}

// this loop will sanitize/validate
function sanitizedProspectRecursiveLoop(array $row): void {
    global $prospects;
    global $output;
    global $stateLookupStatement;
    
    // uppercase, trim, remove '.'
    $state = strtoupper(trim(str_replace('.', '', $row['state'])));
    
    if(strlen($state) != 2) {
        $stateLookupStatement->execute([':state' => $state]);
        $stateCode = $stateLookupStatement->fetch();
        $state = $stateCode ? $stateCode['state_code'] : '??';
    }
    
    $row['state'] = $state;
    $output .= '<tr><td>';
    $output .= implode('</td><td>', $row);
    $output .= '</td></tr>' . PHP_EOL;
    
    if($row = $prospects->fetch()) sanitizedProspectRecursiveLoop($row);
}

echo ($output .= '</table>' . PHP_EOL);