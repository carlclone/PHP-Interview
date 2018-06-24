<?php

//现实例子: 对歌曲次数列表进行排序
function selectionSort($arr)
{
    //每次遍历找出当前最大,放到新数组中,从原数组剔除该元素,继续遍历
    $new = [];
    foreach ($arr as $key => $value) {
        $key = findMax($arr);
        array_push($new, $arr[$key]);
        unset($arr[$key]);
    }
    return $new;
}

function findMax($arr) {
    $max = $arr[0];
    $key =0;
    foreach ($arr as $k=>$value) {
        if ($value > $max) {
            $max = $value;
            $key=$k;
        }
    }
    return $key;
}

$arr = [5,9,33,-1,0,23,555,74, 92];
var_dump(selectionSort($arr));

