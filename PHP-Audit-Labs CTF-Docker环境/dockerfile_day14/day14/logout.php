<?php
    session_start();
    //删除用户登录信息
    unset($_SESSION['username']);
    unset($_SESSION['user_id']);
    echo "<script>location.href='index.php'</script>";