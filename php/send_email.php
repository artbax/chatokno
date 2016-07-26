<?php 
//require_once('user.class.php'); 

$to = trim($_POST['to']);
$from = trim($_POST['from']);
$title = trim($_POST['title']);
$text = trim($_POST['text']);

//echo $to." ".$from." ".$title." ".$text;
if(!empty($to) && !empty($title) && !empty($text))
{
$headers = array('MIME-Version: 1.0', 'Content-Type: text/html; charset="utf-8"');
$message = "Wiadomość wysłana z aplikacji czatokno.warszawa.pl<br /><b>Nadawca: </b>".$from."<br /><b>Tytuł: </b>".$title."<br /><b>Treść: </b>".$text."<br />";

if(mail($to, 'Wiadomość z www.czatokno.warszawa.pl', $message, join("\n", $headers)))
{
	echo "Wiadomość została wysłana";
}
else
{
	echo "error, try again!";
}
}
else
{
        echo "Wypełnij wszystkie pola";
}





?>