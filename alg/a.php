<?php

$arr1 = [
    'name' => 'testname',
    'data' => [
        'title' => 'testtitle',
        'date' => '202222',
        'list' => [
            'id1' => '123',
            'id2' => '345'
        ]
    ],
    'page' => 3
];

$newArr = [];

function a2s($arr, $preKey = '')
{
    $str = '';

    ksort($arr);

    foreach($arr as $k => $v) {
        if(is_array($v)) {
            $str .= a2s($v, $preKey . $k . '.');
        } else {
            $str .= $preKey	 . $k . '=' . $v . ';';
        }
    }

    return $str;
}

var_dump(a2s($arr1));
