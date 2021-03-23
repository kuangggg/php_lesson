<?php

//$timerId = \Swoole\Timer::tick(1000, function(){
//    echo "swoole nice\n";
//});
//\Swoole\Timer::clear($timerId);

$count = 0;
\Swoole\Timer::tick(1000, function ($timerId, $count) {
    global $count;
    echo "Swoole 很棒\n";
    $count++;
    if ($count == 3) {
        \Swoole\Timer::clear($timerId);
    }
}, $count);
