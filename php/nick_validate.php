<?php
require_once('dbconnection.class.php');



class nickValidate extends dbConnection
{
	public function checkNick($value)
	{
	 $sql = 'SELECT user_nick FROM chat_user WHERE user_nick="' . $value .'"'; 												
	 
	  $log = $this->db_conn->prepare($sql);
	  $log->bindParam(':user_nick', $value, PDO::PARAM_STR);
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

$nick_validate = new nickValidate();
$nick_validate->checkNick($_POST['value']);
/*if($nick_validate->checkNick($value))
{
	return 1;//echo "Istnieje taki nick w bazie";
	
}
else
{
	return 0;//echo "nie ma";
}*/

?>