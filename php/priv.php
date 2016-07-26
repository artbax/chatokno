<?php 
session_start();

require_once('priv.class.php');
require_once('error_handler.php');

$nickname = $_GET['nick'];
$option = $_GET['option'];

if($_SESSION['user_nick'] == $nickname)
{
   header('Location: http://www.czatokno.warszawa.pl');
   exit();   
}
else
{
$nick1 = $_SESSION['user_nick']; 
$nick2 = $nickname;
}

$priv = new Priv();

if($option == 'priv')
{
    $priv->setNewTable($nick1, $nick2); 	
}
else if($option == 'checkPrivateChat')
{
        if(isset($_SESSION['user_nick']) && !empty($_SESSION['user_nick']))
        {
	         $priv->checkPrivateChat($_SESSION['user_nick']);
	}
}

?>