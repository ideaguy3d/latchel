<?php declare(strict_types=1);

namespace julius;

use SplFileObject;

$csvPath = '';

if(PHP_SAPI == 'cli') {
    $csvPath = './security/test_address_data.csv';
}
else {
    $csvPath = 'test_address_data.csv';
}

$validData = fn() => '<br /><b style="color:green;">VALID</b>';
$invalidData = fn($msg) => '<br /><b style="color:red;">INVALID: ' . $msg . '</b>';
$escapeOutput = function(string &$output, array $row): void {

};

$output = '<table border=1>';
$csv = new SplFileObject($csvPath, 'r');

while($row = $csv->fgetcsv()) {
    // make sure the current $row is good data
    if(!(isset($row[1]) && is_array($row) && count($row) === 7)) continue;
   
    // remove space & dot for ctype_alpha()
    $cName = str_replace([' ', '.'], '', $row[1]);
    
    escapeOutput($output, $row);
   
    // name validation
    $output .= '<td>';
    $output .= ctype_alpha($cName);
    $output .= '</td><td>';
}

function escapeOutput (string &$output, array $row): void {
     $output .= '<tr>';
    foreach($row as $field) {
        $output .= '<td>' . htmlspecialchars($field) . '</td>';
    }
     $output .= '</tr><tr>';
}


?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>validating input data</title>
    <meta content="text/html; charset=UTF-8" http-equiv="content-type">
</head>
<body>
<?php echo $output; ?>
</body>
</html>