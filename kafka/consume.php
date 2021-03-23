<?php

$producer = new \RdKafka\Producer();
$producer->addBrokers("127.0.0.1:9092");

$obj_topic = $producer->newTopic("php_topic");
