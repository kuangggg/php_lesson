<?php

echo date_default_timezone_get(), PHP_EOL;
echo date('Y-m-d H:i'), PHP_EOL;

date_default_timezone_set('America/New_York');

echo date_default_timezone_get(), PHP_EOL;
echo date('Y-m-d H:i'), PHP_EOL;

$datetime = new DateTime();

