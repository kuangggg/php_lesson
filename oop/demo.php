<?php


class Demo
{
    public $public_attr;

    protected $protected_attr;

    public function pubMethod($name)
    {
        echo "hello " . $name . PHP_EOL;
    }
}
//
////只显示public 属性
//print_r(get_class_vars('Demo'));
//
//
//print_r(get_class_methods('Demo'));


//call_user_func(function($a){
//    echo $a;
//}, 'hello');


call_user_func(['Demo', 'pubMethod'], 'test class');

function test($name)
{
    echo 'hello ' . $name . PHP_EOL;
}

call_user_func('test', 'test func');