<?php

/*
 * Complete the 'rotLeft' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts following parameters:
 *  1. INTEGER_ARRAY a
 *  2. INTEGER d
 */
# https://www.hackerrank.com/challenges/ctci-array-left-rotation
function rotLeft($a, $d) {
    // Write your code here
    $arrayResult = [];
    $sizeArray = sizeof($a);
    
    for($i=$sizeArray - 1; $i >= 0; $i--)
    {
        $moveTo = $i - $d;
        
        if($moveTo < 0)
        {
            $moveTo = $sizeArray + $moveTo;
        }
        
        $arrayResult[$moveTo] = $a[$i];
    }
    
    ksort($arrayResult);
    
    return $arrayResult;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$n = intval($first_multiple_input[0]);

$d = intval($first_multiple_input[1]);

$a_temp = rtrim(fgets(STDIN));

$a = array_map('intval', preg_split('/ /', $a_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = rotLeft($a, $d);

fwrite($fptr, implode(" ", $result) . "\n");

fclose($fptr);
