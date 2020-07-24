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
    // practicing date calculations with DateInterval
    //DateTime::createFromFormat('m-d-Y H:i:s', '01-14-2021 14:24:15');
    $dateTime = new DateTime();
    $curTime = $dateTime->format(DateTime::COOKIE);
    // SUPER COOL !!
    // 'P1Y5M21DT9H38M11S' = 1year 5months 21days 9hours 38mins 11secs
    $interval2 = 'P1Y1M2DT9H38M11S';
    $interval = 'P1M1DT1H2M4S';
    $dateInterval = new DateInterval($interval);
    $futureTime = $dateTime->add($dateInterval);
    $futureTime = $dateTime->format(DateTime::COOKIE);
    $dateInterval2 = new DateInterval($interval2);
    $futureTime2 = $dateTime->add($dateInterval2);
    $futureTime2 = $dateTime->format(DateTime::COOKIE);
    echo "\n\n1_> $curTime";
    echo "\n\n2_> $futureTime";
    echo "\n\n3_> $futureTime2";
    /*
        //-- output:
        1_> Friday, 24-Jul-2020 07:27:58 CEST
        2_> Tuesday, 25-Aug-2020 08:30:02 CEST
        3_> Monday, 27-Sep-2021 18:08:13 CEST
    */
    
    
    echo "\n\n";
    
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