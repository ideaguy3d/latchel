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

// uti,lity lambda functions
$validData = fn($f = '') => '<br /><b style="color:green;">VALID</b>' . $f;
$invalidData = fn($msg) => '<br /><b style="color:red;">INVALID: ' . $msg . '</b>';
// remove spaces & dots
$rSpaceDot = fn($f) => str_replace([' ', '.'], '', $f);
// removes spaces
$rSpace = fn($f) => str_replace(' ', '', $f);
// remove spaces and dash's
$rSpaceDash = fn($f) => str_replace([' ', '-'], '', $f);
// remove dash's and parenthesis
$rDashParen = fn($f) => str_replace(['-', '(', ')'], '', $f);

// _ to represent /
$_tdtd = '</td><td>';

$escapeOutput = function(string &$output, array $row): void {
    $output .= '<tr>';
    foreach($row as $field) {
        $output .= '<td>' . htmlspecialchars($field) . '</td>';
    }
    $output .= '</tr><tr><td>';
};

$output = '<table border=1>';
$csv = new SplFileObject($csvPath, 'r');

// store index's for each field
$idx = new class() {
    public int $name = 0;
    public int $addr1 = 1;
    public int $addr2 = 2;
    public int $postcode = 3;
    public int $phone = 4;
    public int $country = 5;
    public int $notes = 6;
};

// group messages
$msg = new class() {
    public object $invalid;
    
    public function __construct() {
        $this->invalid = new class() {
            public string $name = 'Name can only have letters, spaces, and dots';
            public string $addr = 'Can only include letters, numbers and spaces';
            public string $postcode = 'Can only include letters, numbers, spaces or dashes';
            public string $phone = 'Phone numbers can only be numbers, dashes or parenthesis';
            public string $country = 'Country code must only be 2 letters';
            public string $notes = '';
        };
    }
};

// core validation loop
while($row = $csv->fgetcsv()) {
    // make sure the current $row is good data
    if(!(isset($row[1]) && is_array($row) && count($row) === 7)) continue;
    
    $cName = $rSpaceDot($row[$idx->name]);
    $cAddr1 = $rSpace($row[$idx->addr1]);
    $cAddr2 = $rSpace($row[$idx->addr2]);
    $cPostcode = $rSpaceDash($row[$idx->postcode]);
    $cPhone = $rDashParen($row[$idx->phone]);
    
    $escapeOutput($output, $row);
    
    // name validation
    $output .= ctype_alpha($cName) ? $validData($_tdtd) : $invalidData($msg->invalid->name);
    
    // addr1 & addr2 validation
    $output .= ctype_alnum($cAddr1) ? $validData($_tdtd) : $invalidData($msg->invalid->addr);
    $output .= ctype_alnum($cAddr2) ? $validData($_tdtd) : $invalidData($msg->invalid->addr);
    
    // postcode validation
    $output .= ctype_alnum($cPostcode) ? $validData($_tdtd) : $invalidData($msg->invalid->postcode);
    
    // phone validation
    $output .= ctype_digit($cPhone) ? $validData($_tdtd) : $invalidData($msg->invalid->phone);
    
    
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