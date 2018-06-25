# 网络协议

这些主要面向面试回答作准备



### 状态码

2XX 正确返回

3XX 告知客户端跳转

4XX 客户端错误(请求参数错误,URL错误...)

5XX 服务器错误



## TCP


可靠性问题:丢包,重复包,包出错,包乱序

### 三次握手
保证两边都能正常开始发送和接收
![image.png](https://upload-images.jianshu.io/upload_images/3830995-6767f7e31cee66b1.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

### 滑动窗口

#### 作用

维持可靠性的前提下提高吞吐量 (改进对单个包ack的模式) , 类似操作系统中缓冲区的概念

#### ACK了第一个包才能发送第二个包的模式
![image.png](https://upload-images.jianshu.io/upload_images/3830995-24a928ba0c99acf7.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

#### 滑动窗口改进模式
![image.png](https://upload-images.jianshu.io/upload_images/3830995-6560f31bd1cecdbf.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

#### 可能情况
1.正常情况下窗口会不停一直滑下去

2.丢包的情况下(如没有ACK),会从丢ACK的包处进行超时重传,直到接收到ACK后继续滑动 . 因为ACK是按包顺序ACK的,所以不会出现丢包之后,后面的ACK先发送出去的情况,窗口会一直处于等待状态.

