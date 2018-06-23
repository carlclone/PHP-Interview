# PHP 的垃圾回收机制(Garbage Collect)

PHP5.2之前:简单引用计数
PHP5.2之后:修复了5.2之前循环引用造成的内存泄漏问题

学习PHP变量的底层C实现可以更好地理解垃圾回收

zval结构体

```
typedef union _zvalue_value {
    long lval; //php中bool , int , resource存储方式
    double dval; //浮点型
    struct {
        char *val;
        int len;
        } str; //字符串 , 定义str为上面的struct
    HashTable *ht; //数组 , 指针
    zend_object_value obj; //对象
    //所有字段置为0或null , 表示PHP的null,共8种数据类型
    } zvalue_value;
    
//变量的内存对象
struct _zval_struct {
    zvalue_value value; //上面那个联合体
    zend_uint refcount__gc; //几个变量引用此zval
    zend_uchar type; //类型
    zend_uchar is_ref__gc; //是否(按引用)引用
```


 PHP5.2中使用的内存回收算法是大名鼎鼎的Reference Counting，这个算法中文翻译叫做“引用计数”，其思想非常直观和简洁：为每个内存对象分配一个计数器，当一个内存对象建立时计数器初始化为1(因此此时总是有一个变量引用此对象)，以后每有一个新变量引用此内存对象，则计数器加1，而每当减少一个引用此内存对象的变量则计数器减1，当垃圾回收机制运作的时候，将所有计数器为0的内存对象销毁并回收其占用的内存。而PHP中内存对象就是zval，而计数器就是refcount__gc。[1]
  


存在的问题:循环引用时候的内存泄漏

```
<?php
//循环引用例子
$a = [];
$a[]=&$a;
unset($a);
```

PHP5.3 垃圾回收 :
如果不能完全理解也没有关系，只需记住PHP5.3的垃圾回收算法有以下几点特性：

1、并不是每次refcount减少时都进入回收周期，只有根缓冲区满额后在开始垃圾回收。
2、可以解决循环引用问题。
3、可以总将内存泄露保持在一个阈值以下。

## 延伸
### C语言
结构体:多种数据类型的联合,在一个时刻只能表示一种类型的变量
typedef:数据类型别名定义 [struct和typedef struct](https://www.cnblogs.com/qyaizs/articles/2039101.html)


## 参考
[1][PHP的垃圾回收深入理解](https://www.cnblogs.com/lovehappying/p/3679356.html)



 


