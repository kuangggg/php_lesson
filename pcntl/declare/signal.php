 <?php
//declare(ticks = 1);

$pid = posix_getpid();
echo $pid . "\n";

 pcntl_signal(SIGHUP, function(){
     echo "sighup\n";
 });

 echo "begin\n";

 posix_kill($pid, SIGHUP);

 //调用等待信号的处理器
 pcntl_signal_dispatch();

 echo "complete\n";





