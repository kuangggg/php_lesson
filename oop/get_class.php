<?php

//__CLASS__获取当前的类名，
//
//get_class()与上面一样，都是获取当前的类名
//
//get_called_class()获取当前主调类的类名

class A
{
    public function test()
    {
        echo "A ->" . __CLASS__ . PHP_EOL;
        echo "A ->" . get_class() .PHP_EOL;
        echo "A ->" . get_called_class() .PHP_EOL;
    }
}

class B extends A
{
    public function test()
    {
        parent::test();

        echo "B ->" . __CLASS__ . PHP_EOL;
        echo "B ->" . get_class() .PHP_EOL;
        echo "B ->" . get_called_class() .PHP_EOL;
    }
}

(new B())->test();