# PHP 的垃圾回收机制(Garbage Collect)

PHP5.2之前:简单引用计数
PHP5.2之后:修复了5.2之前循环引用造成的内存泄漏问题

学习PHP变量的底层C实现可以更好地理解垃圾回收

zval结构体
```$xslt

typedef union _zvalue_value {
    long lval; //php中bool , int , resource存储方式
    double dval; //浮点型
    struct {
        char *val;
        int len;
        } str; //字符串
    HashTable *ht; //数组
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

PHP5.2中的垃圾回收算法:当机制运作的时候,将所有计数器为0的内存对象销毁并回收其占用的内存

> PHP5.2中使用的内存回收算法是大名鼎鼎的Reference Counting，这个算法中文翻译叫做“引用计数”，其思想非常直观和简洁：为每个内存对象分配一个计数器，当一个内存对象建立时计数器初始化为1(因此此时总是有一个变量引用此对象)，以后每有一个新变量引用此内存对象，则计数器加1，而每当减少一个引用此内存对象的变量则计数器减1，当垃圾回收机制运作的时候，将所有计数器为0的内存对象销毁并回收其占用的内存。而PHP中内存对象就是zval，而计数器就是refcount__gc。
  

