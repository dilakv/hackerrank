<?php

/*
 * Complete the 'hourglassSum' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts 2D_INTEGER_ARRAY arr as parameter.
 */
# https://www.hackerrank.com/challenges/2d-array
function getSumHourGlass($arr, $iPosition, $jPosition)
{
    $hourGlass = [];
    $sum = 0;
    $isHourGlass = true;
    
    if(!isset($arr[$iPosition+2][$jPosition+2]))
    {
        return null;
    }
    
    for($i=0; $i < 3; $i++)
    {
        $iReal = $i+$iPosition;
        $start = 0;
        $limit = 2;
        if($i===1)
        {
            $start = $limit = 1;
        }
        for($j=$start; $j <= $limit; $j++)
        {
            $jReal = $j + $jPosition;
            $sum += $arr[$iReal][$jReal];
        }
    }
    
    
    return $sum;
}


function hourglassSum($arr) {
    
    // Write your code here
    $sum = [];
    for($i=0; $i<6; $i++)
    {
        for($j=0; $j < 6; $j++)
        {
            $sumHG = getSumHourGlass($arr, $i, $j);
            
            if($sumHG === null)
            {
                continue;
            }
            $sum[] = $sumHG;
        }
    }
    return max($sum);
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$arr = array();

for ($i = 0; $i < 6; $i++) {
    $arr_temp = rtrim(fgets(STDIN));

    $arr[] = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));
}

$result = hourglassSum($arr);

fwrite($fptr, $result . "\n");

fclose($fptr);
