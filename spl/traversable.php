<?php

//  ['trævəsəbl]

//检测一个类是否可以使用 foreach 进行遍历的接口。
//这个接口没有任何方法，它的作用仅仅是作为所有可遍历类的基本接口。

// note While objects and arrays can be traversed by foreach, they do NOT implement "Traversable", so you CANNOT check for foreach compatibility using an instanceof check.


$arr = ['a', 'b'];

$arrObj = (object)$arr;

var_dump($arrObj);


if($arrObj instanceof \Traversable) {
    echo "traversable" . PHP_EOL;
} else {
    echo "not traversable";
}

