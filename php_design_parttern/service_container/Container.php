<?php

//服务器容器,闭包推迟实例化，再make时候再实例

$a = function() {
    echo 1;
};

var_dump($a instanceof Closure);


class Container
{
    protected $binds;

    protected $instances;

    public function bind($abstract, $contract)
    {
        if($contract instanceof Closure) {
            $this->binds[$abstract] = $contract;
        } else {
            $this->instances[$abstract] = $contract;
        }
    }

    public function make($abstract, $params = [])
    {
        if(isset($this->instances[$abstract])) {
            return $this->instances[$abstract];
        }

        return call_user_func_array($this->binds[$abstract], $params);
    }

}

interface Message
{
    public function send();
}

class EmailMessage implements Message
{
    public function send()
    {
        return 'mail send msg';
    }
}

$container = new Container();

$container->bind('EmailMessage', function(){
    return new EmailMessage();
});

$email = $container->make('EmailMessage');

echo $email->send();



