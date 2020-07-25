<?php

$phoneNumbers = [
    // validated numbers
    '+1 123-456-7890',
    '(123) 456-7890',
    '123-456-7890',
    '123.456.7890',
    '01234 567 890',
    '+44 1234567890',
    '+1 408_456*7890',
];

// filter_var(), htmlspecialchars(), str_replace()
validatePhoneNumbers($phoneNumbers);

function validatePhoneNumbers(array $n1) {
    static $n2 = null;
    
    if(empty($n1)) return;
    
    if(null === $n2) {
        $n1count = count($n1);
        $mid = (int)ceil($n1count / 2);
        $n2 = array_splice($n1, $mid);
    }
    
    $item1 = array_shift($n1);
    $item2 = array_shift($n2);
    
    $item1filter = filter_var($item1, FILTER_SANITIZE_NUMBER_INT);
    $item2filter = filter_var($item2, FILTER_SANITIZE_NUMBER_INT);
    
    echo "\n\n";
    echo $item1filter;
    echo "\n";
    echo $item2filter;
    echo "\n\n";
    
    validatePhoneNumbers($n1);
}





// end of file