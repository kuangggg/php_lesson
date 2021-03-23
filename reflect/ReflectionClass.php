<?php

class Demo
{

    public $pubPro;

    protected $proPro;

    private $priPro;


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


$class = new ReflectionClass('Demo');

//Reflection::export($class);
//var_dump(new Demo());

function parseClass(ReflectionClass $class)
{
    $des = '';

    $des .= 'get name : ';
    $des .= $class->getName();
    $des .= PHP_EOL;

    $des .= 'is user defined : ';
    $des .= $class->isUserDefined() ? 'y' : 'n';
    $des .= PHP_EOL;

    $des .= 'is internal  : ';
    $des .= $class->isInternal() ? 'y' : 'n';
    $des .= PHP_EOL;

    $des .= 'is interface  : ';
    $des .= $class->isInterface() ? 'y' : 'n';
    $des .= PHP_EOL;

    $des .= 'is abstract  : ';
    $des .= $class->isAbstract() ? 'y' : 'n';
    $des .= PHP_EOL;

    $des .= 'is final  : ';
    $des .= $class->isFinal() ? 'y' : 'n';
    $des .= PHP_EOL;

    $des .= 'file path  : ';
    $des .= $class->getFileName();
    $des .= PHP_EOL;

    $lines = @file($class->getFileName());
    $from = $class->getStartLine();
    $end = $class->getEndLine();
    $len = $end - $from + 1;

    $des .= implode(array_slice($lines, $from-1, $len));

    $methods = $class->getMethods();

    echo $des;

    echo var_export($methods, true);
}

parseClass($class);

function parseMethod(ReflectionMethod $method)
{
    $des = '';

    $des .= 'get name : ';
    $des .= $method->getName();
    $des .= PHP_EOL;

    $des .= 'is user defined : ';
    $des .= $method->isUserDefined() ? 'y' : 'n';
    $des .= PHP_EOL;

    $des .= 'is internal  : ';
    $des .= $method->isInternal() ? 'y' : 'n';
    $des .= PHP_EOL;

    $des .= 'is public  : ';
    $des .= $method->isPublic() ? 'y' : 'n';
    $des .= PHP_EOL;

    $des .= 'is static  : ';
    $des .= $method->isStatic() ? 'y' : 'n';
    $des .= PHP_EOL;

    $des .= 'is construct  : ';
    $des .= $method->isConstructor() ? 'y' : 'n';
    $des .= PHP_EOL;

    echo $des;
}

parseMethod($class->getMethod('pubFunc'));





