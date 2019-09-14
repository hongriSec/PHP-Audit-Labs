<?php
include './config.php'; 
function select($sql){
    $re = mysql_query($sql);
    $arr = array();
    while ($row = mysql_fetch_array($re)) {
        $arr[] = $row;
    }
    return $arr;
}
function filtering($str) {
    $check= eregi('select|insert|update|delete|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile', $str);
    if($check)
        {
        echo "非法字符!";
        exit();
    }

    $newstr="";
    while($newstr!=$str){
    $newstr=$str;
    $str = str_replace("script", "", $str);
    $str = str_replace("execute", "", $str);
    $str = str_replace("update", "", $str);
    $str = str_replace("master", "", $str);
    $str = str_replace("truncate", "", $str);
    $str = str_replace("declare", "", $str);
    $str = str_replace("select", "", $str);
    $str = str_replace("create", "", $str);
    $str = str_replace("delete", "", $str);
    $str = str_replace("insert", "", $str);
    $str = str_replace("\'", "", $str);

    }
    return $str;
}
function safe_str($str){
    if(!get_magic_quotes_gpc()) {
        if( is_array($str) ) {
            foreach($str as $key => $value) {
                $str[$key] = safe_str($value);
            }
        }else{
            $str = addslashes($str);
        }
    }
    return $str;
}

function dhtmlspecialchars($string) {
    if(is_array($string)) {
        foreach($string as $key => $val) {
            $string[$key] = dhtmlspecialchars($val);
        }
    } else {
        $string = str_replace(array('&', '"', '<', '>','(',')'), array('&', '"', '<', '>','（','）'), $string);
        if(strpos($string, '&#') !== false) {
            $string = preg_replace('/&((#(\d{3,5}|x[a-fA-F0-9]{4}));)/', '&\\1', $string);
        }
    }
    return $string;
}

?>