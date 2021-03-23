<?php

$exchangeName = 'demo';
$routeKey = 'hello';

$message = 'hello world';

$connConfig = [
    'host' => 'rabbitmq',
    'port' => '5672',
    'vhost' => '/',
    'login' => 'myuser',
    'password' => 'mypass'
];


try {

    $conn = new AMQPConnection($connConfig);
    if(!$conn->connect()) {
        exit('连接失败');
    }

    //先通道声明--传入连接的套接字--构造函数 通过通道连接创建消息通道
    $channel = new AMQPChannel($conn);

    //交换机声明--传入声明的通道-- 构造函数 通过通道连接交换机
    $exchange = new AMQPExchange($channel);

    //设置交换机
    $exchange->setName($exchangeName);
    $exchange->setType(AMQP_EX_TYPE_DIRECT);
    $exchange->setFlags(AMQP_DURABLE);
    $exchange->declareExchange();

    //发送消息 参数一：要发送的消息内容，参数二：路由
    echo "send status:" . $exchange->publish($message, $routeKey) . "\n";
    echo "send data:" . $message . "\n";

} catch (AMQPConnectionException $e) {
    var_dump($e->getMessage(), ['cfg' => $connConfig]);
}

