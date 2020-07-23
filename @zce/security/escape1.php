<?php
$testData = [
    'Test string with no tags',
    'The price of a an all-day bus pass is £4.10 or approximately $6.00',
    'Hur mår du idag min vän?',            // how are you today my friend (Swedish)
    'Test <b>string</b> with <i>harmless</i> tags',
    'Test <b>string</b> with bogus image <img src="http://verybadwebsite/badcode.php" />',
    "Test string with javascript <script>alert('XSS Attack');</script>"
];

echo entityRecursion($testData);
echo specialcharRecursion($testData);

function entityRecursion (array $data): string {
    static $html = '<h2>Using htmlentities():</h2><ul>';
    
    $item = htmlentities(array_shift($data), ENT_QUOTES);
    $html .= "<li>escaped output: $item</li>" . PHP_EOL;
    
    if(!empty($data)) return entityRecursion($data);
    else return ($html .= '</ul><br>');
}

function specialcharRecursion (array $data): string {
    static $html = '<h2>Now using htmlspecialchars()</h2><ul>';
    
    $elem = htmlspecialchars(array_shift($data), ENT_QUOTES);
    $html .= "<li>escaped output: $elem</li>" . PHP_EOL;
    
    if(!empty($data)) return specialcharRecursion($data);
    else return ($html .= '</ul><br>');
}