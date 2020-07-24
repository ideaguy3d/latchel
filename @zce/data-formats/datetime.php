<?php declare(strict_types=1);

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
    jDatesIteration($dates);
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
