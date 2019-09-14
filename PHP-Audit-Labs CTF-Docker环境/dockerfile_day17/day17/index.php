<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body style="background-color: #999">
    <div style="position:relative;margin:0 auto;width:300px;height:200px;padding-top:100px;font-size:20px;">
    <form action="" method="post">
        <table>
            <tr>
                请用管理员密码进行登录~~
            </tr>
            <tr>
                <td>密码：</td><td><input type="text" name='password'></td>
            </tr>
            <tr>
                <td><input type="submit" name='submit' style="margin-left:30px;"></td>
            </tr>
        </table>
    </form>
        </div>
    <!-- $password=$_POST['password'];
    $sql = "SELECT * FROM admin WHERE username = 'admin' and password = '".md5($password,true)."'";
    $result=mysqli_query($link,$sql);
        if(mysqli_num_rows($result)>0){
            echo 'you are admin ';
        }
        else{
            echo '密码错误!';
        } -->
</body>
</html>
<?php
require 'db.inc.php';
$password=$_POST['password'];
$sql = "SELECT * FROM ctf.users WHERE username = 'admin' and password = '".md5($password,true)."'";
#echo $sql;
$result=mysql_query($sql);
if(mysql_num_rows($result)>0){
    echo 'you are admin ';
    if(!isset($_GET['option'])) die();
    $str = addslashes($_GET['option']);
    $file = file_get_contents('./config.php');
    $file = preg_replace('|\$option=\'.*\';|', "\$option='$str';", $file);
    file_put_contents('./config.php', $file);
    }
    else{
        echo '密码错误!';
    }
?>