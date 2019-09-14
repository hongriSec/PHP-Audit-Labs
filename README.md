# PHP-Audit-Labs

[![language](/icon/language.svg)](#) [![PHP-Code-Review](/icon/PHP-Code-Review.svg)](#) [![license](/icon/license.svg)](#) 

大家好，我们是红日安全-代码审计小组。此项目是关于代码审计的系列文章分享，还包含一个CTF靶场供大家练习，我们给这个项目起了一个名字叫 **PHP-Audit-Labs** ，希望对想要学习代码审计的朋友们有所帮助。如果你愿意加入我们，一起完善这个项目，欢迎通过邮件形式（**hongrisec@gmail.com**）联系我们。

## Part1

**Part1** 部分属于项目 **第一阶段** 的内容，本阶段的内容题目素材均来自 [PHP SECURITY CALENDAR 2017](https://www.ripstech.com/php-security-calendar-2017/) 。对于每一道题目，我们均给出对应的分析，并结合实际CMS进行解说。在文章的最后，我们还会留一道CTF题目，供大家练习，文章内容如下：

* [ [红日安全]代码审计Day1 - in_array函数缺陷](/Part1/Day1/files/README.md) 
* [ [红日安全]代码审计Day2 - filter_var函数缺陷](/Part1/Day2/files/README.md) 
* [ [红日安全]代码审计Day3 - 实例化任意对象漏洞](/Part1/Day3/files/README.md) 
* [ [红日安全]代码审计Day4 - strpos使用不当引发漏洞](/Part1/Day4/files/README.md) 
* [ [红日安全]代码审计Day5 - escapeshellarg与escapeshellcmd使用不当](/Part1/Day5/files/README.md) 
* [ [红日安全]代码审计Day6 - 正则使用不当导致的路径穿越问题](/Part1/Day6/files/README.md) 
* [ [红日安全]代码审计Day7 - parse_str函数缺陷](/Part1/Day7/files/README.md) 
* [ [红日安全]代码审计Day8 - preg_replace函数之命令执行](/Part1/Day8/files/README.md) 
* [[红日安全]代码审计Day9 - str_replace函数过滤不当](/Part1/Day9/files/README.md) 
* [[红日安全]代码审计Day10 - 程序未恰当exit导致的问题](/Part1/Day10/files/README.md) 
* [[红日安全]代码审计Day11 - unserialize反序列化漏洞](/Part1/Day11/files/README.md) 
* [[红日安全]代码审计Day12 - 误用htmlentities函数引发的漏洞](/Part1/Day12/files/README.md) 
* [[红日安全]代码审计Day13 - 特定场合下addslashes函数的绕过](/Part1/Day13/files/README.md) 
* [[红日安全]代码审计Day14 - 从变量覆盖到getshell](/Part1/Day14/files/README.md) 
* [[红日安全]代码审计Day15 - $_SERVER['PHP_SELF']导致的防御失效问题](/Part1/Day15/files/README.md) 
* [[红日安全]代码审计Day16 - 深入理解$_REQUESTS数组](/Part1/Day16/files/README.md) 
* [[红日安全]代码审计Day17 - Raw MD5 Hash引发的注入](/Part1/Day17/files/README.md) 

## Part2

**Part2** 部分属于项目 **第二阶段** 的内容，本阶段的内容主要分析 **PHP** 主流框架中存在的漏洞，文章内容如下：

### ThinkPHP5

- [[红日安全]ThinkPHP5漏洞分析之SQL注入(一)](/Part2/ThinkPHP5/ThinkPHP5漏洞分析之SQL注入1.md) 
- [[红日安全]ThinkPHP5漏洞分析之SQL注入(二)](/Part2/ThinkPHP5/ThinkPHP5漏洞分析之SQL注入2.md) 
- [[红日安全]ThinkPHP5漏洞分析之SQL注入(三)](/Part2/ThinkPHP5/ThinkPHP5漏洞分析之SQL注入3.md) 
- [[红日安全]ThinkPHP5漏洞分析之SQL注入(四)](/Part2/ThinkPHP5/ThinkPHP5漏洞分析之SQL注入4.md) 
- [[红日安全]ThinkPHP5漏洞分析之SQL注入(五)](/Part2/ThinkPHP5/ThinkPHP5漏洞分析之SQL注入5.md) 
- [[红日安全]ThinkPHP5漏洞分析之SQL注入(六)](/Part2/ThinkPHP5/ThinkPHP5漏洞分析之SQL注入6.md) 
- [[红日安全]ThinkPHP5漏洞分析之文件包含(七)](/Part2/ThinkPHP5/ThinkPHP5漏洞分析之文件包含7.md) 
- [[红日安全]ThinkPHP5漏洞分析之代码执行(八)](/Part2/ThinkPHP5/ThinkPHP5漏洞分析之代码执行8.md) 
- [[红日安全]ThinkPHP5漏洞分析之代码执行(九)](/Part2/ThinkPHP5/ThinkPHP5漏洞分析之代码执行9.md) 
- [[红日安全]ThinkPHP5漏洞分析之代码执行(十)](/Part2/ThinkPHP5/ThinkPHP5漏洞分析之代码执行10.md) 

## PHP-Audit-Labs题解

* [[红日安全]PHP-Audit-Labs题解之Day1-4](/PHP-Audit-Labs题解/Day1-4/files/README.md) 
* [[红日安全]PHP-Audit-Labs题解之Day5-8](/PHP-Audit-Labs题解/Day5-8/files/README.md) 
* [[红日安全]PHP-Audit-Labs题解之Day9-12](/PHP-Audit-Labs题解/Day9-12/files/README.md) 
* [[红日安全]PHP-Audit-Labs题解之Day13-16](/PHP-Audit-Labs题解/Day13-16/files/README.md) 


## PHP-Audit-Labs CTF-Docker环境

* [[红日安全]PHP-CTF-Docker1](/PHP-CTF-Docker/dockerfile_day1/Dockerfile) 
* [[红日安全]PHP-CTF-Docker2](/PHP-CTF-Docker/dockerfile_day2/Dockerfile) 
* [[红日安全]PHP-CTF-Docker3](/PHP-CTF-Docker/dockerfile_day3/Dockerfile)
* [[红日安全]PHP-CTF-Docker4](/PHP-CTF-Docker/dockerfile_day4/Dockerfile)
* [[红日安全]PHP-CTF-Docker5](/PHP-CTF-Docker/dockerfile_day5/Dockerfile)
* [[红日安全]PHP-CTF-Docker6](/PHP-CTF-Docker/dockerfile_day6/Dockerfile)
* [[红日安全]PHP-CTF-Docker7](/PHP-CTF-Docker/dockerfile_day7/Dockerfile)
* [[红日安全]PHP-CTF-Docker8](/PHP-CTF-Docker/dockerfile_day8/Dockerfile)
* [[红日安全]PHP-CTF-Docker9](/PHP-CTF-Docker/dockerfile_day9/Dockerfile)
* [[红日安全]PHP-CTF-Docker10](/PHP-CTF-Docker/dockerfile_day10/Dockerfile)
* [[红日安全]PHP-CTF-Docker11](/PHP-CTF-Docker/dockerfile_day11/Dockerfile)
* [[红日安全]PHP-CTF-Docker12](/PHP-CTF-Docker/dockerfile_day12/Dockerfile)
* [[红日安全]PHP-CTF-Docker13](/PHP-CTF-Docker/dockerfile_day13/Dockerfile)
* [[红日安全]PHP-CTF-Docker14](/PHP-CTF-Docker/dockerfile_day14/Dockerfile)
* [[红日安全]PHP-CTF-Docker15](/PHP-CTF-Docker/dockerfile_day15/Dockerfile)
* [[红日安全]PHP-CTF-Docker16](/PHP-CTF-Docker/dockerfile_day16/Dockerfile)
* [[红日安全]PHP-CTF-Docker17](/PHP-CTF-Docker/dockerfile_day17/Dockerfile)


## 项目维护

- 小峰（团队[@红日](http://sec-redclub.com/))
- 七月火 ([博客](https://mochazz.github.io/))

## 免责说明

**请勿用于非法的用途，否则造成的严重后果与本项目无关**

## 转载

**转载请注明来自**

https://github.com/hongriSec/PHP-Audit-Labs/

## 投搞

**欢迎大家投搞**

sec-redclub@qq.com