<?php

// 普通数组
$s = memory_get_usage(); $st = microtime(true);

$array = [];
for ($i = 0; $i < 1000000; $i++) {
    $array[] = $i;
}
$e = memory_get_usage(); $et = microtime(true);
echo sprintf('普通数组， 存储100万条数据占用%fMB内存, 耗时%f<br/>', ($e-$s) / 1024 / 1024, $et - $st);

// SplFixedArray
$s = memory_get_usage(); $st = microtime(true);

$fixedArray = new \SplFixedArray(1000000);
for ($i = 0; $i < 1000000; $i++) {
    $fixedArray[$i] = $i;
}
$e = memory_get_usage(); $et = microtime(true);
echo sprintf('使用SplFixedArray， 存储100万条数据占用%fMB内存, 耗时%f<br/>', ($e-$s) / 1024 / 1024, $et - $st);


// 读取耗时
$st = microtime(true);
foreach ($array as $v) {

}
$et = microtime(true);
echo sprintf('普通数组， 遍历100万条数据耗时%f<br/>', ($et-$st));

$st = microtime(true);
foreach ($fixedArray as $v) {

}
$et = microtime(true);
echo sprintf('使用SplFixedArray， 遍历100万条数据耗时%f<br/>', ($et-$st));

