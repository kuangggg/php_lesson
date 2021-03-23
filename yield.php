<?php

//function myRange(int $num)
//{
//    for($i = 0; $i < $num; $i++) {
//        yield $i;
//    }
//}
//
//foreach(myRange(10) as $v) {
//    sleep(1);
//    echo $v, PHP_EOL;
//}

$fp = fopen('list.txt', 'rb');

function myRange1($fp)
{
    while(!feof($fp)) {
        yield fgets($fp);
    }
}

foreach(myRange1($fp) as $row) {
    echo $row;
}

printf("the memory peak is %d bytes\n", memory_get_peak_usage());

fclose($fp);






