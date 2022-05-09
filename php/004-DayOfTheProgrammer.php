<?php

/*
 * Complete the 'dayOfProgrammer' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts INTEGER year as parameter.
 */
# https://www.hackerrank.com/challenges/day-of-the-programmer
function dayOfProgrammer($year)
{
    // Write your code here

    $day = 13;

    if (
        ($year < 1919 &&
            $year % 4 === 0) ||

        $year >= 1919 &&
        ($year % 400 === 0 ||
            ($year % 4 === 0 && $year % 100 !== 0)
        )
    ) {
        $day = 12;
    }

    if ($year === 1918) {
        $day = 26;
    }

    return $day . '.09.' . $year;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$year = intval(trim(fgets(STDIN)));

$result = dayOfProgrammer($year);

fwrite($fptr, $result . "\n");

fclose($fptr);
