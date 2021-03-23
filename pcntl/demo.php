<?php
declare(ticks=1);

function h($sig)
{
    var_dump($sig);
}

pcntl_signal(SIGTERM, "h");

while(true)
{
    echo time();
    sleep(6);
}
