<?php

interface Observer
{
    function process();
}


interface Observable
{
    function attach(Observer $o);

    function detach(Observer $o);

    function notify();
}


class Subject implements Observable
{
    protected $observers = [];

    public function attach(Observer $o)
    {
        $name = spl_object_hash($o);
        if(!isset($this->observers[$name])) {
            $this->observers[$name] = $o;
        }
    }

    public function detach(Observer $o)
    {
        $name = spl_object_hash($o);
        if(isset($this->observers[$name])) {
            unset($this->observers[$name]);
        }
    }

    public function notify()
    {
        foreach($this->observers as $observer) {
            $observer->process();
        }
    }
}

class WriteLog implements Observer
{
    public function process()
    {
        echo 'write log to file' . PHP_EOL;
    }
}

class Auth implements Observer
{
    function process()
    {
        echo 'do auth check' . PHP_EOL;
    }
}

$obj = new Subject();
$obj->attach(new WriteLog());
$obj->attach(new Auth());

$obj->notify();
