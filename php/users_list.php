<?php 

require_once('user.class.php'); 

$case = $_GET['case'];

$list = new User();

if($case == 'allUsersList')
{
	$list->allUsersList();
}



?>