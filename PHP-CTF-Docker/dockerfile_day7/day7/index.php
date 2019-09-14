<?php
$a = "hongri";
echo $a;
$id = $_GET['id'];
@parse_str($id);
if ($a[0] != 'QNKCDZO' && md5($a[0]) == md5('QNKCDZO')) {
    echo '<a href="uploadsomething.php">flag is here</a>';
}
?>
