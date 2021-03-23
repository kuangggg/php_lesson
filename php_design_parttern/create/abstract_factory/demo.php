<?php

interface KeyboardProduct
{
    public function show();
}

class FskKeyboard implements KeyboardProduct
{
    public function show()
    {
        echo 'fsk keyboard';
    }
}

interface ScreenProduct
{
    public function show();
}

class FskScreen implements ScreenProduct
{
    public function show()
    {
        echo 'fsk screen';
    }
}

interface AbstractFactory
{
	public function createKeyboard();

	public function createScreen();
}

class FskFactory implements AbstractFactory
{
    public function createKeyboard()
    {
        return new FskKeyboard();
    }

    public function createScreen()
    {
        return new FskScreen();
    }
}

$fsk = new FskFactory();

$keyboard = $fsk->createKeyboard();

$keyboard->show();