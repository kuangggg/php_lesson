<?php

$result = array_map(function($v){
    return $v + 1;
}, [1, 2, 3]);

print_r($result);
