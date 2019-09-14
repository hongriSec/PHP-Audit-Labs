<?php
require_once('config.php');

if(!isset($_SESSION['name']) || !isset($_SESSION['money'])){
	header('Location: register.php');
	die('Register first');
}
