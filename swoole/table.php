<?php

$table = new Swoole\Table(1024);
$table->column('id', Swoole\Table::TYPE_INT, 4); //1,2,4,8
$table->column('name', Swoole\Table::TYPE_STRING, 64);
$table->column('num', Swoole\Table::TYPE_FLOAT);
$table->create();

var_dump($table->count());