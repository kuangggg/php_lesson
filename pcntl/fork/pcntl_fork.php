<?php

$pid = pcntl_fork();

if($pid == -1) {
    die("could not fork");
} elseif ($pid == 0) {
    cli_set_process_title("child");
    echo getmypid();
    echo "i'm the child process\n";
} else {
    cli_set_process_title("master");
    echo getmypid();
    echo "i'm master process\n";
}

sleep(60);

