<?php
highlight_file('index.php');
function waf($a){
    foreach($a as $key => $value){
        if(preg_match('/flag/i',$key)){
            exit('are you a hacker');
        }
    }
}
foreach(array('_POST', '_GET', '_COOKIE') as $__R) {
    if($$__R) { 
        foreach($$__R as $__k => $__v) { 
            if(isset($$__k) && $$__k == $__v) unset($$__k); 
        }
    }

}
if($_POST) { waf($_POST);}
if($_GET) { waf($_GET); }
if($_COOKIE) { waf($_COOKIE);}

if($_POST) extract($_POST, EXTR_SKIP);
if($_GET) extract($_GET, EXTR_SKIP);
if(isset($_GET['flag'])){
    if($_GET['flag'] === $_GET['hongri']){
        exit('error');
    }
    if(md5($_GET['flag'] ) == md5($_GET['hongri'])){
        $url = $_GET['url'];
        $urlInfo = parse_url($url);
        if(!("http" === strtolower($urlInfo["scheme"]) || "https"===strtolower($urlInfo["scheme"]))){
            die( "scheme error!");
        }
        $url = escapeshellarg($url);
        $url = escapeshellcmd($url);
        system("curl ".$url);
    }
}
?>