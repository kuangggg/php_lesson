<?php

class Product
{
    private $parts = [];

    public function add($part)
    {
        $this->parts[] = $part;
    }

    public function show()
    {
        echo "product show" . PHP_EOL;

        foreach($this->parts as $part) {
            echo $part . PHP_EOL;
        }
    }
}

interface IBuilder
{
    public function buildPartA();

    public function buildPartB();

    public function getProduct();
}

class ConcreteBuilder implements IBuilder
{
    private $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function buildPartA()
    {
        $this->product->add('A1');
    }

    public function buildPartB()
    {
        $this->product->add('B2');
    }

    public function getProduct() : Product
    {
        return $this->product;
    }
}

class Director
{
    public function build(IBuilder $builder)
    {
        $builder->buildPartA();
        $builder->buildPartB();

        return $builder;
    }
}

$director = new Director();

$director->build(new ConcreteBuilder())->getProduct()->show();

