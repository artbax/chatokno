<?php 
require_once('user.class.php');
require_once('error_handler.php');

$email = $_POST['email'];
$pass = $_POST['password'];

$login = new User();
$login->emailAndPass(trim($email), trim($pass));

?>