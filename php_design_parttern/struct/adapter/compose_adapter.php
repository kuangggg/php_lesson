<?php

class Adaptee
{
    public function originMethod()
    {
        return "origin method";
    }
}

interface Target
{
    public function originMethod();

    public function extMethod();
}


class Adatper implements Target
{
    private $adaptee;

    public function __construct(Adaptee $adaptee)
    {
        $this->adaptee = $adaptee;
    }

    public function originMethod()
    {
        return $this->adaptee->originMethod();
    }

    public function extMethod()
    {
        return $this->originMethod() . " ext method";
    }
}

$adapter = new Adatper(new Adaptee());

echo $adapter->extMethod();

