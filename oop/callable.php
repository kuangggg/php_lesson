<?php

//php函数method_exists()与is_callable()
//一个方法存在并不意味着它就可以被调用。
//对于 private，protected和public类型的方法，method_exits()会返回true，
//但是is_callable()会检查存在其是否可以访问，如果是private，protected类型的，它会返回false

class Demo
{
    public function t1()
    {

    }

    protected function t2()
    {

    }

    private function t3()
    {

    }

}


$obj = new Demo();

var_dump(method_exists($obj, 't3'));

var_dump(is_callable($obj, 't3'));
