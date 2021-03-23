<?php

spl_autoload_register(function($class){
    require_once $class . '.php';
});

set_exception_handler(function($e){
    echo $e->getMessage() . PHP_EOL;
});


class Factory
{
    public static function createProduct(string $type) : ProductInterface
    {
        $product = null;
        switch ($type) {
            case 'A':
                $product = new ProductA();
                break;
            case 'B':
                $product = new ProductB();
                break;
        }

        return $product;
    }
}
