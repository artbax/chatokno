<?php 
session_start();

require_once ('error_handler.php');
require_once ('validate.class.php');

$validationType = '';   
if(isset($_POST['validationType']))
{
   $validationType = $_POST['validationType'];
}

$validator = new Validate();

if($validationType == 'php')
{
   $validator->ValidatePHP();   
} 




?>