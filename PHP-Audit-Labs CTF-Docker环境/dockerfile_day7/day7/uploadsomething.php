<?php
header("Content-type:text/html;charset=utf-8");
$referer = $_SERVER['HTTP_REFERER'];
if(isset($referer)!== false) {
    $savepath = "uploads/" . sha1($_SERVER['REMOTE_ADDR']) . "/";
    if (!is_dir($savepath)) {
        $oldmask = umask(0);
        mkdir($savepath, 0777);
        umask($oldmask);
    }
    if ((@$_GET['filename']) && (@$_GET['content'])) {
        //$fp = fopen("$savepath".$_GET['filename'], 'w');
        $content = 'HRCTF{y0u_n4ed_f4st}   by:l1nk3r';
        file_put_contents("$savepath" . $_GET['filename'], $content);
        $msg = 'Flag is here,come on~ ' . $savepath . htmlspecialchars($_GET['filename']) . "";
        usleep(100000);
        $content = "Too slow!";
        file_put_contents("$savepath" . $_GET['filename'], $content);
    }
   print <<<EOT
<form action="" method="get">
<div class="form-group">
<label for="exampleInputEmail1">Filename</label>
<input type="text" class="form-control" name="filename" id="exampleInputEmail1" placeholder="Filename">
</div>
<div class="form-group">
<label for="exampleInputPassword1">Content</label>
<input type="text" class="form-control" name="content" id="exampleInputPassword1" placeholder="Contont">
</div>
<button type="submit" class="btn btn-default">Submit</button>
</form>
EOT;
}
else{
    echo 'you can not see this page';
}
?>