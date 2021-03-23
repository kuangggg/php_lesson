<?php

class MakeOrder
{
    public function process()
    {
        echo '生成订单' . PHP_EOL;
    }
}

class Pay
{
    public function process()
    {
        echo '付款' . PHP_EOL;
    }
}

class Delivery
{
    public function process()
    {
        echo '发货' . PHP_EOL;
    }
}


class BuyFacade
{
    protected $makeOrder;
    protected $pay;
    protected $delivery;

    public function __construct()
    {
        $this->makeOrder = new MakeOrder();
        $this->pay = new Pay();
        $this->delivery = new Delivery();
    }

    public function purchase()
    {
         $this->makeOrder->process();
         $this->pay->process();
         $this->delivery->process();
    }

}

$buy = new BuyFacade();

$buy->purchase();
