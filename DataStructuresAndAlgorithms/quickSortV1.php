<?php

//使用了额外空间的版本
//不足:边界条件的选择,做题的时候备好纸笔,画图(刘宇波老师课程,算法图解中的方式)
function quickSort($arr)
{
    if (count($arr) ==0) {
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
