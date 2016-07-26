<?php

require_once('error_handler.php');
require_once('chat.class.php');


$mode = $_POST['mode']; // jaka metoda klasy Chat bedzie realizowana
$target = $_POST['target'];


$chat = new Chat();

// albo switch, albo ify.... 
if($mode == 'sendMessage')
{
	$message = $_POST['post'];
	$user = $_POST['user'];
	$date = date("Y-m-d H:i:s");
	$bold = $_POST['bold'];
	$italic = $_POST['italic'];
	$underline = $_POST['underline'];
	$color = $_POST['color'];
	
	
	$chat->sendMessage($user, $message, $date, $bold, $italic, $underline, $color, $target);
}
else if($mode == 'loadChat')
{    
     header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . 'GMT'); 
     header('Cache-Control: no-cache, must-revalidate'); 
     header('Pragma: no-cache');
     header('Content-Type: application/json; charset=utf-8');
     echo json_encode($chat->loadChat($target));
	 //$chat->loadChat($target);
}

else if($mode == 'deleteMessages')
{
	 $chat->deleteMessages($target);
}




 
	





?>