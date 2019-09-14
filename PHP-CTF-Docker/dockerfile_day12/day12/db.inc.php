<?php 
$mysql_conf = array(
    'host'    => '127.0.0.1:3306', 
    'db'      => 'day12', 
    'db_user' => 'root', 
    'db_pwd'  => 'root', 
    );
$mysql_conn = @mysql_connect($mysql_conf['host'], $mysql_conf['db_user'], $mysql_conf['db_pwd']);
if (!$mysql_conn) {
    die("could not connect to the database:\n" . mysql_error());//诊断连接错误
}
?>