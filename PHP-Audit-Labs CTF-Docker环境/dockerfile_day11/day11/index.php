<?php
include "config.php";

class HITCON{
    public $method;
    public $args;
    public $conn;

    function __construct($method, $args) {
        $this->method = $method;
        $this->args = $args;
        $this->__conn();
    }

    function __conn() {
        global $db_host, $db_name, $db_user, $db_pass, $DEBUG;
        if (!$this->conn)
            $this->conn = mysql_connect($db_host, $db_user, $db_pass);
        mysql_select_db($db_name, $this->conn);
        if ($DEBUG) {
            $sql = "DROP TABLE IF  EXISTS  users";
            $this->__query($sql, $back=false);
            $sql = "CREATE TABLE IF NOT EXISTS users (username VARCHAR(64),
            password VARCHAR(64),role VARCHAR(256)) CHARACTER SET utf8";

            $this->__query($sql, $back=false);
            $sql = "INSERT INTO users VALUES ('orange', '$db_pass', 'admin'), ('phddaa', 'ddaa', 'user')";
            $this->__query($sql, $back=false);
        }
        mysql_query("SET names utf8");
        mysql_query("SET sql_mode = 'strict_all_tables'");
    }

    function __query($sql, $back=true) {
        $result = @mysql_query($sql);
        if ($back) {
            return @mysql_fetch_object($result);
        }
    }

    function login() {
        list($username, $password) = func_get_args();
        $sql = sprintf("SELECT * FROM users WHERE username='%s' AND password='%s'", $username, md5($password));
        $obj = $this->__query($sql);

        if ( $obj != false ) {
            define('IN_FLAG', TRUE);
            $this->loadData($obj->role);
        }
        else {
          $this->__die("sorry!");
        }
    }

    function loadData($data) {
        if (substr($data, 0, 2) !== 'O:' && !preg_match('/O:\d:/', $data)) {
            return unserialize($data);
        }
        return [];
    }

    function __die($msg) {
        $this->__close();
        header("Content-Type: application/json");
        die( json_encode( array("msg"=> $msg) ) );
    }

    function __close() {
        mysql_close($this->conn);
    }

    function source() {
        highlight_file(__FILE__);
    }

    function __destruct() {
        $this->__conn();
        if (in_array($this->method, array("login", "source"))) {
            @call_user_func_array(array($this, $this->method), $this->args);
        }
        else {
            $this->__die("What do you do?");
        }
        $this->__close();
    }

    function __wakeup() {
        foreach($this->args as $k => $v) {
            $this->args[$k] = strtolower(trim(mysql_escape_string($v)));
        }
    }
}
class SoFun{
    public $file='index.php';

    function __destruct(){
        if(!empty($this->file)) {
            include $this->file;
        }
    }
    function __wakeup(){
        $this-> file='index.php';
    }
}
if(isset($_GET["data"])) {
    @unserialize($_GET["data"]);
}
else {
    new HITCON("source", array());
}

?>