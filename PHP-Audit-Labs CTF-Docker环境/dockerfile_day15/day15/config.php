<?php  
$servername = "localhost";
$username = "root";
$password = "toor";
$dbname = "day15";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("连接失败: ");
}
?>