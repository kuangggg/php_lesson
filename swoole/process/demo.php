<?php
//
//$pool = new Swoole\Process\Pool(10);
//
//$pool->on('workerStart', function(Swoole\Process\Pool $pool, int $workerId){
//    echo "worker#{$workerId} is started\n";
//});
//
//$pool->on("workerStop", function($pool, $workerId){
//    echo "worker#{$workerId} is stop\n";
//});
//
//$pool->start();


Swoole\Process::signal(SIGTERM, function($s){
    echo "shut down";
});

while(true);

