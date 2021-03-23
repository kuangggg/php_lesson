<?php

$res = password_hash('hello', PASSWORD_DEFAULT);
var_dump($res);

$opt = [
    'salt' => md5(mt_rand(1111, 9999)),
    //用来指明算法递归的层数
    'cost' => 12,
];

$start = microtime(true);
// 此算法生成结果长度在未来可能变化
//$res = password_hash('hello', PASSWORD_DEFAULT, $opt);

//此算法固定60位长度
$res = password_hash('hello', PASSWORD_BCRYPT, $opt);
var_dump($res);

var_dump(microtime(true) - $start, '加密耗时');

$res = password_verify('hello', $res);
var_dump($res);