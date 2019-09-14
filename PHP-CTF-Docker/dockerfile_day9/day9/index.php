<?php
include 'flag.php';
if(isset($_GET['code'])){
    $code=$_GET['code'];
    if(strlen($code)>40){
        die("Long.");
    }
    if(preg_match("/[A-Za-z0-9]+/",$code)){
        die("NO.");
    }
    @eval($code);
}
else{
    highlight_file(__FILE__);
}
highlight_file(__FILE);
// $hint = "php function getFlag() to get flag";

?>