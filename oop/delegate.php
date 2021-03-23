<?php
//委托

class ContractHandle
{
    public function process($params, $params1)
    {
        echo 'doing some with ' . $params . $params1 . PHP_EOL;
    }
}

class Handle
{
    function __call($name, $arguments)
    {
        if(is_callable('ContractHandle', $name)) {
            return call_user_func_array(['ContractHandle', $name], $arguments);
        }
    }
}


$obj = new Handle();

$obj->process('abc', '123');