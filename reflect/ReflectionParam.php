<?php

class Demo
{

    public $pubPro;

    protected $proPro;

    private $priPro;

    public function __construct(array $arr = [], $num = 1, $str = "hello")
    {

    }

    public function pubFunc()
    {

    }

    protected function proFunc()
    {

    }

    protected function priFunc()
    {

    }
}

$reflectClass = new ReflectionClass('Demo');

$method = $reflectClass->getMethod('__construct');

echo var_export($method->getParameters(), true), PHP_EOL;

$params = $method->getParameters();

foreach($params as $param) {
    echo $param->getName() . "\t";
    print_r($param->getDefaultValue());
    echo PHP_EOL;
}
