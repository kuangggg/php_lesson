一般用法是 declare(ticks=N);
拿declare(ticks=1)来说，这句主要作用有两种：
1、Zend引擎每执行1条低级语句就去执行一次 register_tick_function() 注册的函数。
可以粗略的理解为每执行一句php代码（例如:$num=1;）就去执行下已经注册的tick函数。
一个用途就是控制某段代码执行时间，例如下面的代码虽然最后有个死循环，但是执行时间不会超过5秒。
运行 php ticks.php