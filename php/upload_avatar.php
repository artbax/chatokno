<?php
session_start();

$album_name = $_SESSION['user_nick'];
$image = basename($_FILES['pic']['tmp_name']);
$tmppath = "../avatars/".$album_name."/".$image;

move_uploaded_file($_FILES['pic']['tmp_name'],$tmppath); // funkcja kopiuje picture do wskazanego folderu
	  
require_once('scal.class.php');
$frompath = "../avatars/".$album_name; // z jakiego katalogu
$topath = "../avatars/".$album_name."/42x42"; // do jakiego katalogu
$max_height = 38;
$max_width = 38; 
$addsmallpic = new Scaling();
$addsmallpic->Skalowanie($image, $topath, $frompath, $max_height, $max_width); // avatar w katalogu

$frompathimage = "avatars/".$album_name."/".$image; // duzy avatar
$topathimage = "avatars/".$album_name."/42x42/".$image;//$topath."/".$image; // maly avatar

require_once('user.class.php');
$updateAvatar = new User();
$updateAvatar->updateAvatar($album_name, $topathimage, $frompathimage);

//echo "<script>$('.show_link_1').replaceWith('avatar dodany');</script>";
header('Location: http://www.czatokno.warszawa.pl');


?>