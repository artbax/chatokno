<?php 
session_start();
unset($_SESSION['values']);
unset($_SESSION['errors']);

header('Location: http://www.czatokno.warszawa.pl');

?>