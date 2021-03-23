<?php
//try {
//    throw new Exception("meaningful exception");
//} catch (\Exception $e) {
//    echo $e->getMessage();
//}
//注册全局异常处理

set_exception_handler('exceptionHandle');

function exceptionHandle(Exception $e)
{
    echo $e->getMessage();

    error_log('unhandled exception : ' . $e->getMessage());
}

throw new Exception('just test');