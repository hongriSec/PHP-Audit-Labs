<?php
class NotFound{
    function __construct()
    {
        die('404');
    }
}
spl_autoload_register(
    function ($class){
        new NotFound();
    }
);
$classname = isset($_GET['name']) ? $_GET['name'] : null;
$param = isset($_GET['param']) ? $_GET['param'] : null;
$param2 = isset($_GET['param2']) ? $_GET['param2'] : null;
if(class_exists($classname)){
    $newclass = new $classname($param,$param2);
    var_dump($newclass);
    foreach ($newclass as $key=>$value)
        echo $key.'=>'.$value.'<br>';
}