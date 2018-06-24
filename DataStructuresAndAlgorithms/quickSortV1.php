<?php

//使用了额外空间的版本
function quickSort($arr)
{
    if (count($arr) < 2) {
        return $arr;
    }

    $less = [];
    $greater = [];
    foreach ($arr as $k => $value) {
        if ($value < $arr[0]) {
            array_push($less, $value);
        }
        if ($value > $arr[0]) {
            array_push($greater, $value);
        }
    }

    return array_merge(quickSort($less), [$arr[0]], quickSort($greater));

}

function dd($value)
{
    var_dump($value);
    die();
}

$arr = [5,9,33,-1,0,23,555,74, 92];
dd(quickSort($arr));
