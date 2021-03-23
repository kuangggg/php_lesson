<?php

$input = '9213322333qq.com';


$res = filter_var($input, FILTER_SANITIZE_EMAIL);

var_dump($res, '过滤邮箱');

$res = filter_var($input, FILTER_VALIDATE_EMAIL);

var_dump($res, '验证邮箱');
