<?php

$exchangeName = 'demo_topic';
$topic = 'test.topic';

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
    $exchange->setType(AMQP_EX_TYPE_TOPIC);
    $exchange->setFlags(AMQP_DURABLE);
    echo 'exchange status:' . $exchange->declareExchange() . "\n";


    $queue = new AMQPQueue($channel);
    $queue->setFlags(AMQP_EXCLUSIVE);
    echo 'queue status:' . $queue->declareQueue() . "\n";
    echo 'queue bind status:' . $queue->bind($exchangeName, $topic) . "\n";
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
    echo '消费者1 处理消息 test.topic';
    var_dump(['data' => $msg]);
    $queue->ack($envelop->getDeliveryTag());
}
