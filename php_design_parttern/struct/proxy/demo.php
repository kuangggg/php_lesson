<?php

interface Subject
{
    public function process();

}

class RealSubject implements Subject
{
    function process()
    {
        echo "real process" . PHP_EOL;
    }
}

class ProxySubject implements Subject
{
    private $subject;

    public function __construct()
    {
        $this->subject = new RealSubject();
    }

    public function process()
    {
        echo "prefix proxy handle" . PHP_EOL;
        $this->subject->process();
    }
}

(new ProxySubject())->process();