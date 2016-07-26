<?php 
session_start();

require_once('user.class.php');
require_once('error_handler.php');
$var = $_SESSION['user_email']; 
$logout = new User();

$logout->loggingOut($var);




?>