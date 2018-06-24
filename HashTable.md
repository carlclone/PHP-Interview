# Hash Table
散列表（Hash table，也叫哈希表），是根据关键码值(Key value)而直接进行访问的数据结构。也就是说，它通过把关键码值映射到表中一个位置来访问记录，以加快查找的速度。这个映射函数叫做散列函数，存放记录的数组叫做散列表。

## Hash相关题目
Q:哈希是什么？hash冲突后，数据怎么存？

A:哈希也称散列 , 哈希函数像一个漏斗一样将一个集合的元素映射到另一个集合 , [1]哈希冲突后, 在冲突的位置形成一个链表,将哈希值一样的元素串联起来,查找时先找到链表,然后在链表里顺序查找

Q:数组和hash的区别是什么？ (数组和Hash Table的区别?)

A: HashTable使用数组实现(非PHP数组),key可以为非数字 , 2.存储同样大小的数据,HashTable所需数组要大于纯数组 

## Hash冲突解决方案
    开放寻址法
    再散列法
    链地址法（拉链法）
    建立一个公共溢出区
    

## Hash应用
用于查找:Hash索引[5]:MySQL中,当不需要排序或者查找一个元素的上下文环境时,可使用Hash索引

表驱动法[4]:常用于优化if,else语句结构,方便修改,经典例子:[人寿保险利息](xx)

用作缓存
用于防止重复:对文件进行哈希(md5摘要也有同样作用)



## 延伸
### 加密算法和摘要算法[2]
> 看到这里，有些同学可能会问，我常用的md5、hash算法(sha1、sha256、sha512、sha1024等）怎么没见你提及，其实准确的说，md5和hash算法不能算是加密算法，它们都属于信息摘要算法，可以为不同的信息生成独一无二的信息摘要，而它们都属于不可逆算法，即无法通过生成的摘要信息还原出原始信息。利用这种特性，实际应用中，经常会使用这些算法对用户输入的密码进行运算，并对运算结果进行比较来验证用户输入密码是否正确。还有一种应用场景是通信签名，用于验证通信过程中信息是否丢失或被篡改。

AES(Advanced Encryption Standard)

SHA(Secure Hash Algorithm)

MD5(Message Digest Algorithm Version 5)

RSA(Ron Rivest , Adi Shamir , Leonard Adleman 3个人姓氏开头...一个非对称加密算法)

### 对称和非对称加密[2,3]

对称加密:双方使用相同的加解密方法(密钥)
非对称加密:加密方法相同,只有拥有私钥的一方才能解密,缺点:慢

经常二者结合使用,如HTTPS中

### PHP Hash Table的实现


## 参考
[1]算法图解

[2][PHP 加密最佳实践](https://laravel-china.org/articles/4499/talk-about-encryption-that-thing-php-encryption-best-practice)

[3]图解HTTP

[4]Code Complete

[5]高性能MySQL

[6][PHP Hash Table 的实现](https://www.cnblogs.com/leezhxing/p/4823631.html)
