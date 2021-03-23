<?php
$pid = file_get_contents('pid');
//posix_kill($pid, SIGKILL);
//posix_kill($pid, SIGTERM);

posix_kill($pid, SIGUSR1);
