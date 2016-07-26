<?php
require_once('dbconnection.class.php');



class emailValidate extends dbConnection
{
	public function checkEmail($value)
	{
	 $sql = 'SELECT user_email FROM chat_user WHERE user_email="' . $value .'"'; 												
	 
	  $log = $this->db_conn->prepare($sql);
	  $log->bindParam(':user_email', $value, PDO::PARAM_STR);
	  $result = $log->execute();
	  $rows = $log->fetch();
	  $n = count($rows);
	  
	  
      if ($n == 1)
	  {
		  echo 0;  // true
	  }
	  else
	  {
		  echo 1;  // false
	  }
	}
} 

$email_validate = new emailValidate();
$email_validate->checkEmail($_POST['value']);


?>