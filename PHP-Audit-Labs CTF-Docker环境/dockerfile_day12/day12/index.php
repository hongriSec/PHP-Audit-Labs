<?php
require 'db.inc.php';

if(isset($_REQUEST['username'])){
    if(preg_match("/(?:\w*)\W*?[a-z].*(R|ELECT|OIN|NTO|HERE|NION)/i", $_REQUEST['username'])){
        die("Attack detected!!!");
    }
}

if(isset($_REQUEST['password'])){
    if(preg_match("/(?:\w*)\W*?[a-z].*(R|ELECT|OIN|NTO|HERE|NION)/i", $_REQUEST['password'])){
        die("Attack detected!!!");
    }
}

function clean($str){
    if(get_magic_quotes_gpc()){
        $str=stripslashes($str);
    }
    return htmlentities($str, ENT_QUOTES);
}

$username = @clean((string)$_GET['username']);
$password = @clean((string)$_GET['password']);


$query='SELECT * FROM day12.users WHERE name=\''.$username.'\' AND pass=\''.$password.'\';';

#echo $query;

$result=mysql_query($query);
var_dump($result);
while($row = mysql_fetch_array($result))
{
    echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";
    echo "</tr>";
}

?>