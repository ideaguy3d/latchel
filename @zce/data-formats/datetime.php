<?php declare(strict_types=1);

echo "\n\r";
$dates = [
    'Next monday',
    'Yesterday',
    '', // CURRENT_TIME
    '2020-12-25',
    '2020-7-23',
    '25 December 2021',
    '-1 week',
    '+1 days',
];

try {
    // to avoid confusion between Aug 9th 2020 between "9-8-20" & "8-9-20"
    $date = '8-9-20';
    // month = Aug
    $dateTime = DateTime::createFromFormat('m-d-Y', $date);
    echo '_> ' . $dateTime->format(DateTime::COOKIE);
    // month = Sep
    $dateTime = DateTime::createFromFormat('d-m-Y', $date);
    echo "\n_> " . $dateTime->format(DateTime::COOKIE);
    
    echo "\n\n";
    
    //jDatesIteration($dates);
    jDatesRecursion($dates);
}
catch(\Throwable $e) {
    echo $e->getMessage();
}

/**
 * @param array $dates
 *
 * @throws Exception
 */
function jDatesIteration(array $dates): void {
    foreach($dates as $date) {
        $dateTime = new DateTime($date);
        echo $dateTime->format(DateTime::COOKIE) . PHP_EOL;
    }
}

/**
 * @param array $dates
 *
 * @throws Exception
 */
function jDatesRecursion (array $dates): void {
    if(empty($dates)) return;
    
    $date = $dates[0];
    $dateTime = new DateTime($date);
    echo $dateTime->format(DateTime::COOKIE) . PHP_EOL;
    
    jDatesRecursion(array_slice($dates, 1));
}

// end of PHP file