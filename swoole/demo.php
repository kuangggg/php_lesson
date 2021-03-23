<?php

class Email
{
    static $email = null;
}

Swoole\Coroutine::create(function () {

    function task1($email)
    {
        Email::$email = $email;
        Swoole\Coroutine::sleep(3); // 模拟io阻塞
        echo "发邮件：" . Email::$email . PHP_EOL;
    }

    function task2($email)
    {
        Email::$email = $email;
        echo "发邮件：" . Email::$email . PHP_EOL;

    }

    Swoole\Coroutine::create('task1', '975975398@gmail.com');

    Swoole\Coroutine::create('task2', 'gaobinzhan@gmail.com');

});
