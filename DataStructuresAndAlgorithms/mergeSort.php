<?php
//思路:从中间分成两半,不断细分,然后对有序数组进行合并,合并是关键,太多边界条件
//额外空间版本
//基线条件:数字有0个元素
function mergeSort($arr)
{
    if (count($arr) ==1) {
        return $arr;
    }
    $left = array_slice($arr, 0,(int)(count($arr)/2));
    $right = array_slice($arr, (int)(count($arr)/2));
//    dd($right);
    return merge(mergeSort($left), mergeSort($right));
}

//合并的时候错了,给两个数组各一个指针,然后移动指针对比
//注意各种条件的边界,画图..........
//瞎猫碰死耗子 -- 调试法写算法 , 一点也不严谨 , 还是得跟着刘宇波用C++严谨地演算一遍
function merge($left,$right)
{
    $combined = [];
    $countLeft = count($left);
    $countRight = count($right);
    $leftIndex = $rightIndex = 0;

    while ($leftIndex < $countLeft && $rightIndex < $countRight) {
        if ($left[$leftIndex] > $right[$rightIndex]) {
            $combined[] = $right[$rightIndex];
            $rightIndex++;
        } else {
            $combined[] = $left[$leftIndex];
            $leftIndex++;
        }
    }
    while ($leftIndex < $countLeft) {
        $combined[] = $left[$leftIndex];
        $leftIndex++;
    }
    while ($rightIndex < $countRight) {
        $combined[] = $right[$rightIndex];
        $rightIndex++;
    }
    return $combined;
}

function dd($value)
{
    var_dump($value);
    die();
}

$arr = [5,9,33,-1,0,23,555,74, 92];
var_dump(mergeSort($arr));
