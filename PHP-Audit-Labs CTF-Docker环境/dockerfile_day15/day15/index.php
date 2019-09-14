<?php 
include "./config.php";
include "./flag.php";
error_reporting(0);

$black_list = "/admin|guest|limit|by|substr|mid|like|or|char|union|select|greatest|%00|\'|";
$black_list .= "=|_| |in|<|>|-|chal|_|\.|\(\)|#|and|if|database|where|concat|insert|having|sleep/i";
if(preg_match($black_list, $_GET['user'])) exit(":P"); 
if(preg_match($black_list, $_GET['pwd'])) exit(":P"); 

$query="select user from users where user='$_GET[user]' and pwd='$_GET[pwd]'";
echo "<h1>query : <strong><b>{$query}</b></strong><br></h1>";
$result = $conn->query($query);
if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    if($row['user']) echo "<h2>Welcome {$row['user']}</h2>";
}

$result = $conn->query("select pwd from users where user='admin'");
if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $admin_pass = $row['pwd'];
}

if(($admin_pass)&&($admin_pass === $_GET['pwd'])){
    echo $flag;
}
highlight_file(__FILE__);
?>