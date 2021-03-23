<?php

$obj = new SplQueue();

$obj->enqueue('a');
$obj->enqueue('b');
$obj->enqueue('c');

print_r($obj);
