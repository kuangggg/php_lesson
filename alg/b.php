<?php


$list = [
    ['id' => 1, 'pid' => 0, 'name' => 'k1'],
    ['id' => 2, 'pid' => 1, 'name' => 'k2'],
    ['id' => 3, 'pid' => 2, 'name' => 'k3'],
    ['id' => 4, 'pid' => 2, 'name' => 'k4'],
    ['id' => 6, 'pid' => 3, 'name' => 'k5'],
];


$refer = [];
$tree = [];
foreach($list as $k => $v) {
    $refer[$v['id']] =& $list[$k];
}

foreach($list as $k => $v) {
    $parentId = $v['pid'] ;
    if($parentId == 0) {
        $tree[] =& $list[$k];
    } else {
        if(isset($refer[$parentId])) {
            $parent =& $refer[$parentId];
            $parent['child'][] =& $list[$k];
//            $refer[$parentId]['child'][] =& $list[$k];
        }
    }
}

print_r($tree);
