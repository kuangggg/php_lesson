<?php

class myIterator implements Iterator
{
    private $arr = [
        'a', 'b', 'c'
    ];

    private $idx = 0;

    public function __construct()
    {
        $this->idx = 0;
    }

    public function current()
    {
        return $this->arr[$this->idx];
    }

    public function key()
    {
        return $this->idx;
    }

    public function rewind()
    {
        $this->idx = 0;
    }

    public function next()
    {
        ++$this->idx;
    }

    public function valid()
    {
        return isset($this->arr[$this->idx]);
    }
}
$iterator = new myIterator();

foreach($iterator as $k => $v) {
    echo $k, $v, PHP_EOL;
}