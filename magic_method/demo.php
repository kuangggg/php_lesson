<?php

class Demo
{

    public function __call($name, $arguments)
    {
        echo 'not exists method ' . $name;
    }

    public static function __callStatic($name, $arguments)
    {
        echo 'call not exists static method' . $name;
    }

}



$obj = new Demo();
//
//$obj->hello('world');
//Demo::test();

var_dump($obj);

$obj1 = $obj;
//浅拷贝，引用,指向同一个对象
var_dump($obj1);

$serializeObj = serialize($obj);
$newObj = unserialize($serializeObj);
//深拷贝
var_dump($newObj);
