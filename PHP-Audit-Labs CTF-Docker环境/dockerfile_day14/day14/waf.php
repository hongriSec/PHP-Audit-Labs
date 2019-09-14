<?php
    
foreach ($_GET as $key => $value) {
    if ($key != "username"&&strstr($key, "password") == false) {
        $_GET[$key] = filtering($value);
    }
}
foreach ($_POST as $key => $value) {
    if ($key != "username"&&strstr($key, "password") == false) {
        $_POST[$key] = filtering($value);
    }
}
foreach ($_REQUEST as $key => $value) {
    if ($key != "username"&&strstr($key, "password") == false) {
        $_REQUEST[$key] =   ($value);
    }
}

$request_uri = explode("?", $_SERVER['REQUEST_URI']);
if (isset($request_uri[1])) {
    $rewrite_url = explode("&", $request_uri[1]);
    foreach ($rewrite_url as $key => $value) {
        $_value = explode("=", $value);
        if (isset($_value[1])) {
            $_REQUEST[$_value[0]] = dhtmlspecialchars(addslashes($_value[1]));
        }
    }
}

foreach ($_POST as $key => $value) {
    $_POST[$key] = safe_str($value);
    $_GET[$key] = dhtmlspecialchars($value);
}
foreach ($_COOKIE as $key => $value) {
    $_COOKIE[$key] = safe_str($value);
    $_GET[$key] = dhtmlspecialchars($value);
}
    
?>