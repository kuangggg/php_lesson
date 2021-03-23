<?php

trait Singleton {

    private static $_instance = null;

    public static function getInstance()
    {
        $class = get_called_class();

        if(!(self::$_instance instanceof  $class)) {
            self::$_instance = new $class;
        }

//        if(empty(self::$_instance)) {
//            self::$_instance = new $class;
//        }

        return self::$_instance;
    }
}

class A
{
    use Singleton;
}

class B
{
    use Singleton;
}

//$a = new A();
//
//$b = new B();


var_dump(A::getInstance(), B::getInstance(), B::getInstance());
