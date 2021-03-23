<?php

interface Strategy
{
    public function handle();
}


class OneStrategy implements Strategy
{
    public function handle()
    {
        echo "first handle" . PHP_EOL;
    }
}


class SecondStrategy implements Strategy
{
    public function handle()
    {
        echo "second handle" . PHP_EOL;
    }
}

class Context
{
    private $strategy;

    function __construct(Strategy $s)
    {
        $this->strategy = $s;
    }

    public function run()
    {
        $this->strategy->handle();
    }
}

(new Context(new OneStrategy()))->run();
(new Context(new SecondStrategy()))->run();
