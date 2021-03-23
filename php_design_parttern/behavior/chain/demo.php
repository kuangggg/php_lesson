<?php

abstract class Handler
{
    /**
     * @var null Handler
     */
    public $successor = null;

    public function setSuccessor(Handler $successor)
    {
        $this->successor = $successor;
    }

    abstract public function handleRequest($request);
}

class ConcreteHandler1 extends Handler
{
    public function handleRequest($request)
    {
        if(is_numeric($request)) {
            return 'request -> number';
        }

        if(!is_null($this->successor)) {
            return $this->successor->handleRequest($request);
        }
    }
}

class ConcreteHandler2 extends Handler
{
    public function handleRequest($request)
    {
        if(is_string($request)) {
            return 'request -> string';
        }

        if(!is_null($this->successor)) {
            return $this->successor->handleRequest($request);
        }
    }
}

$handler1 = new ConcreteHandler1();
$handler1->setSuccessor(new ConcreteHandler2());

$requests = [1, -1, 3, "kuan", "abc"];

foreach($requests as $v) {
    echo $handler1->handleRequest($v) . PHP_EOL;
}
