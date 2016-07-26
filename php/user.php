<?php
session_start();

require_once('user.class.php');
require_once('error_handler.php');

$action = $_POST['action']; // jak metoda klasy User bedzie realizowana

$user = new User();

if($action == 'loadUsersOnline')
{
	echo json_encode($user->loadUsersOnline());

}

//echo json_encode($user->loadUsersOnline());


?>