<?php

$http = new Swoole\Http\Server('0.0.0.0', 9501);

$http->set([
    'worker_num' => 2,

    'daemonize' => 1,
    'log_file' => 'swoole.log',
    'log_date_format' => '%Y-%m-%d %H:%M:%S',

    'pid_file' => __DIR__ . '/swoole.pid',
]);

$http->on('start', function(){
    echo 'start';
});

$http->on('request', function ($request, $response) {
    $response->header("Content-Type", "text/html; charset=utf-8");
    $response->end("<h1>Hello Swoole. #".rand(1000, 9999)."</h1>");
});

$http->start();
