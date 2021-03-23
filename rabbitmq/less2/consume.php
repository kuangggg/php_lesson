<?php

$exchangeName = 'demo';
$routeKey = 'hello';
$queueName = 'hello';

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

    $channel = new AMQPChannel($conn);


    $exchange = new AMQPExchange($channel);
    $exchange->setName($exchangeName);
    $exchange->setType(AMQP_EX_TYPE_DIRECT);
    $exchange->setFlags(AMQP_DURABLE);
    echo 'exchange status:' . $exchange->declareExchange() . "\n";


    $queue = new AMQPQueue($channel);
    $queue->setName($queueName);
    $queue->setFlags(AMQP_DURABLE);
    echo 'queue status:' . $queue->declareQueue() . "\n";
    echo 'queue bind status:' . $queue->bind($exchangeName, $routeKey) . "\n";
    echo "\n";

    while(true) {
        $queue->consume('consumeMsg');
    }

} catch (AMQPConnectionException $e) {
    var_dump($e->getMessage(), ['cfg' => $connConfig]);
} catch (AMQPException $e) {
    var_dump($e->getMessage());
}



function consumeMsg($envelop, $queue)
{
    $msg = $envelop->getBody();
    echo '消费者1 处理消息';
    var_dump(['data' => $msg]);
    sleep(mt_rand(1, 9));
    $queue->ack($envelop->getDeliveryTag());
}
