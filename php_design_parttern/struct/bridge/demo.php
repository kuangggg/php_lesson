<?php

interface MessageTpl
{
    public function getTemplate();
}

class LoginMessage implements MessageTpl
{
    public function getTemplate()
    {
        return "you login code is abc" . PHP_EOL;
    }
}

abstract class MessageService
{
    protected $template;
    public function setTpl($template)
    {
        $this->template = $template;
    }

    abstract public function send();
}

class AliService extends MessageService
{
    public function send()
    {
        echo "ali send -> " . $this->template->getTemplate();
    }
}


$service = new AliService();
$service->setTpl(new LoginMessage());

$service->send();