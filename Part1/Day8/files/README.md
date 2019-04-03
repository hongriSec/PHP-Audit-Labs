本文由红日安全成员： **水清云影** 编写，如有不当，还望斧正。

## 前言

大家好，我们是红日安全-代码审计小组。最近我们小组正在做一个PHP代码审计的项目，供大家学习交流，我们给这个项目起了一个名字叫 [**PHP-Audit-Labs**](https://github.com/hongriSec/PHP-Audit-Labs) 。现在大家所看到的系列文章，属于项目 **第一阶段** 的内容，本阶段的内容题目均来自 [PHP SECURITY CALENDAR 2017](https://www.ripstech.com/php-security-calendar-2017/) 。对于每一道题目，我们均给出对应的分析，并结合实际CMS进行解说。在文章的最后，我们还会留一道CTF题目，供大家练习，希望大家喜欢。下面是 **第8篇** 代码审计文章：

## Day8 - Candle

题目叫蜡烛，代码如下

![1](1.png)

>[**preg_replace**](http://php.net/manual/zh/function.preg-replace.php)：(PHP 5.5)
>
>**功能** ： 函数执行一个正则表达式的搜索和替换
>
>**定义** ： `mixed preg_replace ( mixed $pattern , mixed $replacement , mixed $subject [, int $limit = -1 [, int &$count ]] )`
>
>搜索 **subject** 中匹配 **pattern** 的部分， 如果匹配成功以 **replacement** 进行替换

* **$pattern** 存在 **/e** 模式修正符，允许代码执行
* **/e** 模式修正符，是 **preg_replace() ** 将 **$replacement** 当做php代码来执行

**漏洞解析** 

这道题目考察的是 **preg_replace** 函数使用 **/e** 模式，导致代码执行的问题。我们发现在上图代码 **第11行** 处，将 **GET** 请求方式传来的参数用在了 **complexStrtolower** 函数中，而变量 **$regex** 和 **$value** 又用在了存在代码执行模式的 **preg_replace** 函数中。所以，我们可以通过控制 **preg_replace** 函数第1个、第3个参数，来执行代码。但是可被当做代码执行的第2个参数，却固定为 **'strtolower("\\\1")'** 。时间上，这里涉及到正则表达式反向引用的知识，即此处的 **\\\1** ，大家可以参考 [**W3Cschool**](https://www.w3cschool.cn/zhengzebiaodashi/regexp-syntax.html) 上的解释：

>**反向引用** 
>
>对一个正则表达式模式或部分模式 **两边添加圆括号** 将导致相关 **匹配存储到一个临时缓冲区** 中，所捕获的每个子匹配都按照在正则表达式模式中从左到右出现的顺序存储。缓冲区编号从 1 开始，最多可存储 99 个捕获的子表达式。每个缓冲区都可以使用 '\n' 访问，其中 n 为一个标识特定缓冲区的一位或两位十进制数。

本题官方给的 **payload** ：**/?.*={${phpinfo()}}** 实际上并不能用，因为如果GET请求的参数名存在非法字符，PHP会将其替换成下划线，即 `.*` 会变成 `_*` 。这里我们提供一个可用 **payload** ：**\S*=${phpinfo()}** ，详细分析请参考我们前几天发表的文章： [深入研究preg_replace与代码执行](https://xz.aliyun.com/t/2557) 

![14](14.png)


##实例分析

本次实例分析，我们选取的是 **CmsEasy 5.5** 版本，漏洞入口文件为 **/lib/tool/form.php** ，我们可以看到下图第7行处引用了**preg_replace** ，且使用了 **/e** 模式。如果 `$form[$name]['default']` 的内容被正则匹配到，就会执行 **eval** 函数，导致代码执行。具体代码如下：

![2](2.png)

我们再来看看这个 **getform()** 函数在何处被引用。通过搜索，我们可以发现在 **Cache/template/default/manage/guestadd.php** 程序中，调用了此函数。这里我们需要关注 **catid** (下图 **第4行** 代码)，因为 **catid** 作为 **$name** 在 **preg_preolace()** 函数中使用到，这是我们成功利用漏洞的关键。 **guestadd.php** 中的关键代码如下：

![3](3.png)

那么问题来了， **catid** 是在何处定义的，或者说与什么有关？通过搜索，我们发现 **lib/table/archive.php** 文件中的 **get_form()** 函数对其进行了定义。如下图所示，我们可以看到该函数 **return** 了一个数组，数组里包含了**catid** 、 **typeid** 等参数对应的内容。仔细查看，发现其中又嵌套着一个数组。在 **第6行处** 发现了 **default** 字段，这个就是我们上面提到的 `$form[$name]['default']` 。

![4](4.png)

而上图 **第6行** 的 **get()** 方法在 **lib/tool/front_class.php** 中，它是程序内部封装的一个方法。可以看到根据用户的请求方式， **get()** 方法会调用 **front** 类相应的 **get** 方法或 **post** 方法，具体代码如下：

![5](5.png)

 **front** 类的 **get** 方法和 **post** 方法如下，看到其分别对应静态数组

![6](6.png)

继续跟进静态方法 **get** 和 **post** ，可以看到在 **front** 类中定义的静态属性

![7](7.png)

这就意味着前面说的 `$form[$name]['default']` 中 **name** 和 **default** 的内容，都是我们可以控制的。

我们屡一下思路，**get_form** 函数定义了 **catid** 的值， **catid** 对应的 **default** 字段又存在代码执行漏洞。而 **catid** 的值由 **get('catid')** 决定，这个 **get('catid')** 又是用户可以控制的。所以我们现在只要找到调用 **get_form** 函数的地方，即可触发该漏洞。通过搜索，我们发现在 **/lib/default/manage_act.php** 文件的第10行调用了 **get_form()** 函数，通过 **View** 模板直接渲染到前台显示：

![8](8.png)

这就形成了这套程序整体的一个执行流程，如下图所示：

![9](9.png)

##漏洞验证

1、首先打开首页，点击游客投稿

![10](10.png)

2、进入到相应的页面，传给catid值，让他匹配到 `/\{\?([^}]+)\}/e` 这一内容，正则匹配的内容也就是 `{?(任意内容)}` ，所以我们可以构造payload： **catid={?(phpinfo())}** 

![11](11.png)

![12](12.png)

##修复方案
漏洞是 **preg_replace()** 存在 **/e** 模式修正符，如果正则匹配成功，会造成代码执行漏洞，因此为了避免这样的问题，我们避免使用 **/e** 模式修正符，如下图第7行：

![13](13.png)

## 结语

看完了上述分析，不知道大家是否对 **preg_replace()**  **/e** 模式存在的代码执行有了更加深入的理解，文中用到的CMS可以从 [这里](https://pan.baidu.com/s/1tzn6C0bk5H8aLPDBylCDUw) 下载（密码:2xaf） 下载，当然文中若有不当之处，还望各位斧正。如果你对我们的项目感兴趣，欢迎发送邮件到 **hongrisec@gmail.com** 联系我们。**Day8** 的分析文章就到这里，我们最后留了一道CTF题目给大家练手，题目如下(这次放两道题)：
```php
// index.php
<?php
include 'flag.php';
if(isset($_GET['code'])){
    $code=$_GET['code'];
    if(strlen($code)>40){
        die("Long.");
    }
    if(preg_match("/[A-Za-z0-9]+/",$code)){
        die("NO.");
    }
    @eval($code);
}
else{
    highlight_file(__FILE__);
}
highlight_file(__FILE);
// $hint = "php function getFlag() to get flag";

?>
```

```php
// index2.php
<?php
include 'flag.php';
if(isset($_GET['code'])){
    $code=$_GET['code'];
    if(strlen($code)>50){
        die("Too Long.");
    }
    if(preg_match("/[A-Za-z0-9_]+/",$code)){
        die("Not Allowed.");
    }
    @eval($code);
}
else{
    highlight_file(__FILE__);
}
highlight_file(__FILE);
// $hint = "php function getFlag() to get flag";
?> 
```

题解我们会阶段性放出，如果大家有什么好的解法，可以在文章底下留言，祝大家玩的愉快！

## 相关文章

[preg_replace的/e修饰符妙用与慎用](https://521-wf.com/archives/45.html)

[老洞新姿势，记一次漏洞挖掘和利用(PHPMailer RCE)](https://xz.aliyun.com/t/1290)