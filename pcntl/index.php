<?php
//注册信号监听回调

//file_put_contents('pid', posix_getpid());
//
////pcntl_signal(SIGINT, function(){
////    echo '按了 ctrl + c' . PHP_EOL;
////});
//
//pcntl_signal(SIGTERM, function(){
//    echo 'SIGTERM is trigger';
//});
//
//while (true) {
//    pcntl_signal_dispatch();
//    sleep(1);
//}

echo getmypid();

file_put_contents('pid', getmypid());


pcntl_async_signals(true);

pcntl_signal(SIGUSR1, function(){
    echo "register sig";
    posix_kill(getmypid(), SIGSTOP);
});

posix_kill(getmypid(), SIGSTOP);
