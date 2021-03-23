<?php

class Dialog
{
    private $attrs = [];

    private $title = '';

    private $content = '';

    public function addAttr($attr)
    {
        $this->attrs[] = $attr;
    }

    public function addContent($content)
    {
        $this->content = $content;
    }

    public function addTitle($title)
    {
        $this->title = $title;
    }

    public function show()
    {
        echo "title -> " . $this->title . PHP_EOL;
        echo "content -> " . $this->content . PHP_EOL;
        echo "style -> " . implode(",", $this->attrs) . PHP_EOL;
    }
}

interface Builder
{
    public function buildAttr($attr);
    public function buildTitle($title);
    public function buildContent($content);
    public function getDialog();
}

class DialogBuilder implements Builder
{
    private $dialog;
    public function __construct()
    {
        $this->dialog = new Dialog();
    }
    
    public function buildTitle($title)
    {
        $this->dialog->addTitle($title);
    }
    public function buildContent($content)
    {
        $this->dialog->addContent($content);
    }
    public function buildAttr($attr)
    {
        $this->dialog->addAttr($attr);
    }
    
    public function getDialog()
    {
        return $this->dialog;
    }
}

class DialogDirector
{
    public function getBuilder()
    {
        $builder = new DialogBuilder();
        $builder->buildAttr('居中');
        $builder->buildAttr('大号字体');

        $builder->buildTitle('title');
        $builder->buildContent('something');

        return $builder;
    }
}

$director = new DialogDirector();

$director->getBuilder()->getDialog()->show();