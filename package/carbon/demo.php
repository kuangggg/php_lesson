<?php

require_once '../vendor/autoload.php';

echo \Carbon\Carbon::now(), PHP_EOL;

echo \Carbon\Carbon::now()->addDay(), PHP_EOL;

echo \Carbon\Carbon::now()->addDay(), PHP_EOL;

echo \Carbon\Carbon::today(), PHP_EOL;

echo \Carbon\Carbon::tomorrow(), PHP_EOL;

echo \Carbon\Carbon::now()->toDateString(), PHP_EOL;
