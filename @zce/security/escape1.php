<?php
$testData = [
    'Test string with no tags',
    'The price of a an all-day bus pass is £4.10 or approximately $6.00',
    'Hur mår du idag min vän?',            // how are you today my friend (Swedish)
    'Test <b>string</b> with <i>harmless</i> tags',
    'Test <b>string</b> with bogus image <img src="http://verybadwebsite/badcode.php" />',
    "Test string with javascript <script>alert('XSS Attack');</script>"
];

echo dataRecursion($testData);

function dataRecursion (array $data): string {
    static $html = '<ul>';
    
    $item = htmlentities(array_shift($data), ENT_QUOTES, 'UTF-8');
    $html .= "<li>escaped output: $item</li>" . PHP_EOL;
    
    if(!empty($data)) return dataRecursion($data);
    else return ($html .= '</ul>');
}