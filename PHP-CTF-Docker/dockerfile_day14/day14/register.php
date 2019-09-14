<?php 
include './global.php';
if(isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['password_1'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password_1 = $_POST['password_1'];

	$sql1 = "select count(id) from user where username='$username'";
	$re = mysql_query($sql1);
	$arr = mysql_fetch_assoc($re);
	if($arr['count(id)']!=0){
		die("<script language=\"JavaScript\"> alert('该昵称已被注册!');window.history.back(-1); </script> ");
	}
	if($password == $password_1){
        $password = md5($password);
		$sql = "insert into user(username,password) value('$username','$password')";
		$re = mysql_query($sql);
		if($re){
			echo "<script language=\"JavaScript\"> alert('注册成功');self.location='login.php'; </script> ";
		}else{
			echo "<script language=\"JavaScript\"> alert('注册失败!');window.history.back(-1); </script> ";
		}
	}
}


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
		<meta charset="utf-8">
		<link href="./css/style.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
</head>
<body>
	 <!-----start-main---->
	 <div class="main">
		<div class="login-form">
			<h1>Member Register</h1>
					<div class="head">
						<img src="./image/user.png" alt=""/>
					</div>
                    <form action="" method="post">
						用户名：<input type="text" class="text" value="用户名" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'username';}"  name="username">
						密码：<input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '...........';}" name="password">
						确认密码：<input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '...........';}" name="password_1">
						<div class="submit">
							<input type="submit" onclick="myFunction()" value="注册" >
					</div>	
				</form>

</body>
</html>