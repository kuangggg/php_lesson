<?php

function customError($errNo, $errStr, $errFile, $errLine)
{
    echo "Error: {$errNo} {$errStr}";
}


set_error_handler('customError');


//echo $err;


trigger_error('must < 0');

echo ini_get('error_log');


error_log('somthing is error');


var_dump(ini_get('display_errors'));