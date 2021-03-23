<?php

$file = fopen('lock.txt', 'w+');

////阻塞锁
//if(flock($file, LOCK_EX)) {
//    sleep(10);
//    flock($file, LOCK_UN);
//}
//echo '10 s after ', PHP_EOL;
////fclose($file);


//非阻塞锁,这里要用两个进程进行同一个文件访问进行测试

if(flock($file, LOCK_EX | LOCK_NB)) {
    sleep(5);
    flock($file, LOCK_UN);
} else {

    echo 'had locked';

}

