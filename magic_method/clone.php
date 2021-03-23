<?php

//对象的赋值属于浅拷贝,修改对同一个引用的对象都生效
class Test
{
    public $a = 1;
}

$m = new Test();

$n = $m;

$m->a = 23;

echo $n->a;