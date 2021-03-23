<?php


abstract class ProcessRequest
{
    abstract function process();
}

class MainProcess extends ProcessRequest
{
    public function process()
    {
        print __CLASS__ . ": doing main process\n";
    }
}

abstract class DecorateProcess extends ProcessRequest
{
    protected $processRequest;

    function __construct(ProcessRequest $pr)
    {
        $this->processRequest = $pr;
    }
}

class LogProcess extends DecorateProcess
{
    public function process()
    {
        echo __CLASS__ . ": logging\n";
        $this->processRequest->process();
    }
}

class AuthProcess extends DecorateProcess
{
    public function process()
    {
        echo __CLASS__ . ": authed\n";
        $this->processRequest->process();
    }
}

class DoProcess extends DecorateProcess
{
    public function process()
    {
        echo __CLASS__ . ": do other things\n";
        $this->processRequest->process();
    }
}

$process = new DoProcess(new AuthProcess(new LogProcess(new MainProcess())));
$process->process();


