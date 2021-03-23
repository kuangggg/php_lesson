<?php
require_once '../vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger('myApp');
$log->pushHandler(new StreamHandler('logs/debug.log', Logger::DEBUG));
$log->pushHandler(new StreamHandler('logs/warning.log', Logger::WARNING));

$log->debug('this is a debug');
$log->warning('this is a warning');

