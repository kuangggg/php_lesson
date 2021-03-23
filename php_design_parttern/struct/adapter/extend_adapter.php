<?php

//需要适配的角色
class Adaptee
{
    public function originMethod()
    {
        return "adaptee original method";
    }
}

//按照协议扩展方法
interface Target
{
    public function originMethod();

    public function extMethod();
}

//适配角色
class Adpater extends Adaptee implements Target
{
    public function extMethod()
    {
        return $this->originMethod() . ' -> ext process';
    }
}


$adapter = new Adpater();

echo $adapter->extMethod();
