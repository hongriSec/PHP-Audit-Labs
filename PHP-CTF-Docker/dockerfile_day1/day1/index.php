<?php
include 'config.php';
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("连接失败: ");
}

$sql = "SELECT COUNT(*) FROM users";
$whitelist = array();
$result = $conn->query($sql);
if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $whitelist = range(1, $row['COUNT(*)']);
}

$id = stop_hack($_GET['id']);
$sql = "SELECT * FROM users WHERE id=$id";

if (!in_array($id, $whitelist)) {
    die("id $id is not in whitelist.");
}

$result = $conn->query($sql);
if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    echo "<center><table border='1'>";
    foreach ($row as $key => $value) {
        echo "<tr><td><center>$key</center></td><br>";
        echo "<td><center>$value</center></td></tr><br>";
    }
    echo "</table></center>";
}
else{
    die($conn->error);
}

?>
