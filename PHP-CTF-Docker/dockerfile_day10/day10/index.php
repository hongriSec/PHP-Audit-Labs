<?php
include 'config.php';
function stophack($string){
    if(is_array($string)){
        foreach($string as $key => $val) {
            $string[$key] = stophack($val);
        }
    }
    else{
        $raw = $string;
        $replace = array("\\","\"","'","/","*","%5C","%22","%27","%2A","~","insert","update","delete","into","load_file","outfile","sleep",);
        $string = str_ireplace($replace, "HongRi", $string);
        $string = strip_tags($string);
        if($raw!=$string){
            error_log("Hacking attempt.");
            header('Location: /error/');
        }
        return trim($string);
    }
}
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("连接失败: ");
}
if(isset($_GET['id']) && $_GET['id']){
    $id = stophack($_GET['id']);
    $sql = "SELECT * FROM students WHERE id=$id";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        echo '<center><h1>查询结果为：</h1><pre>'.<<<EOF
        +----+---------+--------------------+-------+
        | id | name    | email              | score |
        +----+---------+--------------------+-------+
        |  {$row['id']} | {$row['name']}   | {$row['email']}   |   {$row['score']} |
        +----+---------+--------------------+-------+</center>
EOF;
    }
}
else die("你所查询的对象id值不能为空！");
?>
