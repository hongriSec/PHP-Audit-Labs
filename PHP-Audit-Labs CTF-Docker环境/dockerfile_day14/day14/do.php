<?php
include './global.php';

extract($_REQUEST);
$user_id = isset($_SESSION['user_id'])?$_SESSION['user_id']:0;

$title = htmlentities($title);
$content = htmlentities($content);

$sql = "insert into content(title,content,user_id) values('$title','$content','$user_id')";


$re = mysql_query($sql);
if($re){
    echo "<script language=\"JavaScript\"> alert('留言成功');self.location='./index.php'; </script> ";
}else{
    echo "<script language=\"JavaScript\"> alert('不知道为什么，您的留言失败了，请再次尝试！');self.location='./index.php'; </script> ";
}
?>