<?php

interface Component
{
    public function operation();
}

class ConcreteComponent implements Component
{
    public function operation()
    {
        return 'basic';
    }
}

abstract class Decorator implements Component
{
    protected $component;

    public function __construct(Component $component)
    {
        $this->component = $component;
    }
}

class PrefixDecorator extends Decorator
{
    public function operation()
    {
        return 'prefix ' . $this->component->operation();
    }
}

class SuffixDecorator extends Decorator
{
    public function operation()
    {
        return $this->component->operation() . ' suffix';
    }
}

$component = new ConcreteComponent();

$new = new SuffixDecorator(new PrefixDecorator($component));

echo $new->operation();

