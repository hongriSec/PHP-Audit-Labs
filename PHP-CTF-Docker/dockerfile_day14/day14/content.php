<?php
include './global.php';
extract($_REQUEST);

$sql = "select * from test.content where id=$message_id";
$arr = select($sql);


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./css/body.css" rel='stylesheet' type='text/css' />
    <script src="main.js"></script>
</head>
<body>
    <center>
        <h1><?php echo $arr['0']['title']; ?></h1>
        <?php echo $arr['0']['content']; ?>
    </center>
    
</body>
</html>