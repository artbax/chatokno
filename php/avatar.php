<?php
session_start();
require_once('user.class.php');

$avatar = new User();
$avatar->loadAvatar($_SESSION['user_nick']); 


?>