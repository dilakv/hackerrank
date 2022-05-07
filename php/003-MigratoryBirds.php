<?php

/*
 * Complete the 'migratoryBirds' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts INTEGER_ARRAY arr as parameter.
 */
#https://www.hackerrank.com/challenges/migratory-birds
function migratoryBirds($arr)
{
    // Write your code here
    $count = [];

    foreach ($arr as $bird) {
        if (!empty($count[$bird])) {
            $count[$bird]++;
            continue;
        }

        $count[$bird] = 1;
    }

    $maxValue = max($count);
    $birdReturned = 0;
    $valueReturned = 0;

    foreach ($count as $key => $val) {
        if (
            $val === $maxValue &&
            ($birdReturned === 0 || $key < $birdReturned)
        ) {
            $birdReturned = $key;
        }
    }

    return $birdReturned;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$arr_count = intval(trim(fgets(STDIN)));

$arr_temp = rtrim(fgets(STDIN));

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = migratoryBirds($arr);

fwrite($fptr, $result . "\n");

fclose($fptr);
