<!DOCTYPE html>
<html>
<head>
	<title></title>
		<meta charset="utf-8">
        <link href="./css/body.css" rel='stylesheet' type='text/css' />
        <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <div align="right">
        <?php 
         include './global.php';
        if (isset($_SESSION['username'])) {
            echo '欢迎回来 '.$_SESSION['username'].'&nbsp;&nbsp;&nbsp;&nbsp;<a href="./logout.php">注销</a>';
        }else{
            echo '<a href="./login.php">登陆</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="./register.php">注册</a>';
        } 
        ?>
       
    </div>
    <center>
    <h1>留言板</h1>
        
        <form action="./do.php" method="POST">
            标题：<input type="text" name="title"><br>
            内容：<textarea cols='100' rows="10" style="resize:none;" name="content">请输入内容……</textarea><br>
            <input type="submit" value="提交">
        </form>
        <?php 
        if (!isset($_SESSION['username'])) {
            echo "<h3>请先登陆再留言！</h3>";
            exit;
        }
        ?>
        <h2>历史留言</h2>
        <?php 
        
        $user_id=$_SESSION['user_id'];
        $sql = "select * from content where user_id=$user_id";
        $arr = select($sql);
            ?>
        <table border="0px" width="400px">
            <tr>
                <td align="left"><h4>message_id</h4></td>
                <td align="right"><h4>title</h4></td>
            </tr>
            <?php foreach ($arr as $value) {?>
                <tr>
                    <td align="left"><a href="./content.php?message_id=<?php  echo $value['id']; ?>"><?php echo $value['id']; ?></a></td>
                    <td align="right"><a href="./content.php?message_id=<?php  echo $value['id']; ?>"><?php echo $value['title']; ?></a></td>
                </tr>
        <?php } ?>
        </table>
    </center>
    </body>
</html>