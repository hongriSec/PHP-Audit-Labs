<?php
function check_inner_ip($url)
{
    $match_result=preg_match('/^(http|https)?:\/\/.*(\/)?.*$/',$url);
    if (!$match_result){
        die('url fomat error1');
    }
    try{
        $url_parse=parse_url($url);
    }
    catch(Exception $e){
        die('url fomat error2');
    }
    $hostname=$url_parse['host'];
    $ip=gethostbyname($hostname);
    $int_ip=ip2long($ip);
    return ip2long('127.0.0.0')>>24 == $int_ip>>24 || ip2long('10.0.0.0')>>24 == $int_ip>>24 || ip2long('172.16.0.0')>>20 == $int_ip>>20 || ip2long('192.168.0.0')>>16 == $int_ip>>16 || ip2long('0.0.0.0')>>24 == $int_ip>>24;
}

function safe_request_url($url)
{
    if (check_inner_ip($url)){
        echo $url.' is inner ip';
    }
    else{
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $output = curl_exec($ch);
        $result_info = curl_getinfo($ch);
        if ($result_info['redirect_url']){
            safe_request_url($result_info['redirect_url']);
        }
        curl_close($ch);
        var_dump($output);
    }
}

$url = $_POST['url'];
if(!empty($url)){
    safe_request_url($url);
}
else{
    highlight_file(__file__);
}
//flag in flag.php 

?>