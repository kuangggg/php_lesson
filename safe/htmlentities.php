<?php

$input = '<p><script>alert("You won the Nigerian\' lottery!");</script></p>';

//顺带过滤单引号
echo htmlentities($input, ENT_QUOTES), PHP_EOL;

$input = '<p><script>alert("You won the Nigerian\' lottery!");</script></p>';

//字符转换为 HTML 转义字符
echo htmlentities($input);

// htmlspecialchars()  将特殊字符转换为 HTML 实体
// & " ' < >     // ' 设置 ENT_QUOTES 才会生效


