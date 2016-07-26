<?php 

require_once('error_handler.php');
require_once('user.class.php');

$ktora = $_POST['ktora']; // jaka metoda klasy User bedzie realizowana
$who = $_POST['add_description'];
$what = $_POST['description_content'];

$logged = new User();

if($ktora == 'addDescription')
{
	if($what != '')
	{
	   $logged->addDescription($who, $what);
	}
	else
	{
		header('Location: http://www.czatokno.warszawa.pl');
	}
}


?>