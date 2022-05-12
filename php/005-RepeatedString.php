<?php

function howManyAinString($s)
{
    $manyA = 0;
    $sizeString = strlen($s);
    for($i=0; $i < $sizeString; $i++)
    {
        if($s[$i] === 'a')
        {
            $manyA++;
        }
    }
    
    return $manyA;
}

/*
 * Complete the 'repeatedString' function below.
 *
 * The function is expected to return a LONG_INTEGER.
 * The function accepts following parameters:
 *  1. STRING s
 *  2. LONG_INTEGER n
 */
# https://www.hackerrank.com/challenges/repeated-string
function repeatedString($s, $n) {
    // Write your code here
    $manyA = howManyAinString($s);
    $sizeString = strlen($s);
    
    $series = intval($n/$sizeString) * $manyA;
    
    $res = $n % $sizeString;
    $lastA = substr($s, 0, $res);
    
    $series += howManyAinString($lastA);
    
    return $series;
    
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$s = rtrim(fgets(STDIN), "\r\n");

$n = intval(trim(fgets(STDIN)));

$result = repeatedString($s, $n);

fwrite($fptr, $result . "\n");

fclose($fptr);
