<?php
header("content-type:text/html;charset=utf-8");
$re = mysql_connect("localhost","root","root");
if (!$re) {
    die("数据库链接失败");
}
mysql_query("set name utf8");

mysql_select_db("test");




?>