<?php

interface Logger
{
    function log(string $msg);
}

class StdLogger implements Logger
{
    public function log(string $msg)
    {
        echo $msg . PHP_EOL;
    }
}

interface LoggerFactoryInterface
{
    function createLogger();
}

class StdLoggerFactory implements LoggerFactoryInterface
{
    public function createLogger()
    {
        return new StdLogger();
    }
}

class FileLogger implements Logger
{
    public function log(string $msg)
    {
        $msg = "[" . date('Y-m-d H:i:s') . "]" . $msg . "\n";
        file_put_contents('log.txt', $msg, FILE_APPEND);
    }
}

class FileLoggerFactory implements LoggerFactoryInterface
{
    public function createLogger()
    {
        return new FileLogger();
    }
}

$factory = new StdLoggerFactory();
$logger = $factory->createLogger();
$logger->log('some thing is wrong');


$factory = new FileLoggerFactory();
$logger = $factory->createLogger();
$logger->log('some thing is wrong');

