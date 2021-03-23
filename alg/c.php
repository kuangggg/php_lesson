<?php

$map = [
    6001 => 1,
    5001 => 2,
    4001 => 3,
    3001 => 4,
    2001 => 5,
    1001 => 6,
    501 => 7,
    102 => 8,
    51 => 9,
    21 => 10,
    6 => 15,
    1 => 30,
];

$total = 0;

function compute($num, $map, &$total)
{
    foreach($map as $k => $v) {
        if($num >= $k) {
            $before = $k - 1;

            if($before > 0) {
                $remain = $num - $before;
                $remainVal = $remain * $v;

                $total += $remainVal;
                $total += compute($before, $map, $total);
                break;
            } else {
                return $v * $num;
            }
        }
    }
}

compute(21, $map, $total);

var_dump($total);


