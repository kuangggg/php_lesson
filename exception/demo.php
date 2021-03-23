<?php

try {
//    throw new Exception('danger', 100);

    throw new InvalidArgumentException('ss', 200);

} catch (Exception $e) {
    echo $e->getMessage();
}

