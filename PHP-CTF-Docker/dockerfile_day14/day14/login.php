<?php 
include './global.php';
if (isset($_POST['username'])&&isset($_POST['password'])) {
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	
	$sql = "select * from user where username='{$username}' and password='{$password}'";
	$row = mysql_query($sql);
	
	$a =mysql_fetch_assoc($row);
	if(!$a){
		echo "<script language=\"JavaScript\"> alert('用户名或密码错误，请重新登录!');window.history.back(-1); </script> ";
	}else{
		$_SESSION['username'] = $a['username'];
		$_SESSION['user_id'] = $a['id'];
		echo "<script language=\"JavaScript\"> alert('登录成功');self.location='index.php'; </script> ";
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
			<h1>Member Login</h1>
					<div class="head">
						<img src="./image/user.png" alt=""/>
					</div>
                    <form action="" method="post">
						<input type="text" name="username" class="text" value="USERNAME" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'USERNAME';}" >
						<input type="password" name="password"  value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
						<div class="submit">
							<input type="submit" onclick="myFunction()" value="LOGIN" >
					</div>	
				</form>

</body>
</html>