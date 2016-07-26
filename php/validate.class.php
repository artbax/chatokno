<?php 

require('dbconnection.class.php');

class Validate extends dbConnection
{
	
public function ValidatePHP()
   {
      // Flaga błędu - przyjmuje wartość 1, gdy zostanie napotkany błąd.
      $errorsExist = 0;
            
      if (isset($_SESSION['errors']))
	  {
         unset($_SESSION['errors']);
	  }
	  
      // Domyślnie przyjmuje, że wszystkie pola zostały wypełnione poprawnie.
	  $_SESSION['errors']['nick'] = '';
      $_SESSION['errors']['imie'] = '';
      $_SESSION['errors']['nazwisko'] = '';
      $_SESSION['errors']['plec'] = '';
      $_SESSION['errors']['email'] = '';
	  $_SESSION['errors']['pass1'] = '';
	 
	 
      // Weryfikuje poprawność nazwy użytkownika.
      if (!$this->validateUserNick($_POST['nick']))
      {
         $_SESSION['errors']['nick'] = 'error';
         $errorsExist = 1;
      }
      
      // weryfikuje poprawność nazwiska.
      if (!$this->validateUserImie($_POST['imie']))
      {
         $_SESSION['errors']['imie'] = 'error';
         $errorsExist = 1;
      }
	  
	  if (!$this->validateUserNazwisko($_POST['nazwisko']))
      {
         $_SESSION['errors']['nazwisko'] = 'error';
         $errorsExist = 1;
      }
   
      // Sprawdza, czy wybrano płeć.
      if (!$this->validatePlec($_POST['plec']))
      {
         $_SESSION['errors']['plec'] = 'error';
         $errorsExist = 1;
      }
      
            
      // Weryfikuje poprawność zapisu adresu e-mail.
      if (!$this->validateEmail($_POST['email']))
      {
         $_SESSION['errors']['email'] = 'error';
         $errorsExist = 1;
      }
	  
	  if (!$this->validatePass($_POST['password']))
      {
         $_SESSION['errors']['pass1'] = 'error';
         $errorsExist = 1;
      }
	  
	  if ($errorsExist == 0)
	  {
	          //utworzenie katalogu na avatara
		  mkdir('../avatars/'.$_POST['nick'], 0777, true);
                  chmod('../avatars/'.$_POST['nick'], 0777);
		  mkdir('../avatars/'.$_POST['nick'].'/42x42', 0777, true);
                  chmod('../avatars/'.$_POST['nick'].'/42x42', 0777);
                  
		  // deklaracja dodatkowych zmiennych
		 
		  $permission = 3;
		  $date = date("Y-m-d H:i:s");
		  $user_description = "Uzytkownik jeszcze nic o sobie nie napisal..";
		  $status = 0;
		  if($_POST['plec'] == 1)
		  {
			  $plec = 1;
		  }
		  else
		  {
			  $plec = 2;
		  }
		  
		  if($plec == 1)
		  {
			  $small_avatar = "img/he38x38.jpg";
			  $big_avatar = "img/he.jpg";
		  }
		  else
		  {
			  $small_avatar = "img/she38x38.jpg";
			  $big_avatar = "img/she.jpg";
		  }
		  
		  $salt = "378570bdf03b25c8efa9bfdcfb64f99e";
		  $hash = hash_hmac('md5', $_POST['password'], $salt);
		  
		  $q = 'INSERT INTO chat_user(user_date, user_nick, user_imie, user_nazwisko, user_sex, user_description, user_pass, user_email, user_small_avatar, user_big_avatar, user_status, user_permission) VALUES (:user_date, :user_nick, :user_imie, :user_nazwisko, :user_sex, :user_description, :user_pass, :user_email, :user_small_avatar, :user_big_avatar, :user_status, :user_permission)'; 												
	         $log = $this->db_conn->prepare($q);
	         $log->bindValue(':user_date', $date, PDO::PARAM_STR);
			 $log->bindValue(':user_nick', $_POST['nick'], PDO::PARAM_STR);
			 $log->bindValue(':user_imie', $_POST['imie'], PDO::PARAM_STR);
			 $log->bindValue(':user_nazwisko', $_POST['nazwisko'], PDO::PARAM_STR);
			 $log->bindValue(':user_sex', $plec, PDO::PARAM_STR); 
			 $log->bindValue(':user_description', $user_description, PDO::PARAM_STR); 
			 $log->bindValue(':user_pass', $hash, PDO::PARAM_STR);
			 $log->bindValue(':user_email', $_POST['email'], PDO::PARAM_STR);
			 $log->bindValue(':user_small_avatar', $small_avatar , PDO::PARAM_STR); 
			 $log->bindValue(':user_big_avatar', $big_avatar , PDO::PARAM_STR);
			 $log->bindValue(':user_status', $status , PDO::PARAM_STR);
			 $log->bindValue(':user_permission', $permission , PDO::PARAM_STR);
	         $log->execute();
		  
		  
		  
             unset($_SESSION['values']);
             
             header('Location: http://www.czatokno.warszawa.pl');			 
             			 
	  }
	  else
	  {
		  
		  foreach ($_POST as $key => $value)
          {
            $_SESSION['values'][$key] = $_POST[$key];
			
          }
		  
		  
		  
		  
		 
          header('Location: http://www.czatokno.warszawa.pl');
	  }
		  

   }
   
   private function validateUserNick($value)
   {
	   
	   if ($value == null) 
         return 0; // Niepoprawne.
      
	  $sql = 'SELECT user_nick FROM chat_user WHERE user_nick="' . $value .'"'; 												
	 
	  $log = $this->db_conn->prepare($sql);
	  $log->bindParam(':user_nick', $value, PDO::PARAM_STR);
	  $result = $log->execute();
	  $rows = $log->fetchAll();
	  $n = count($rows);
	  
	  
      if ($n == 1)
	  {
		  return 0;
	  }
	  else
	  {
		  return 1;
	  }
         
	 
	 
   }
   
   private function validateUserImie($value)
   {
      // trim and escape input value      
      $value = trim($value);
      // Użytkownik nie może pozostawić pustego pola.
      if ($value) 
         return 1; // Poprawne.
      else
         return 0; // Niepoprawne.
   }
   
   private function validateUserNazwisko($value)
   {
      // trim and escape input value      
      $value = trim($value);
      // Użytkownik nie może pozostawić pustego pola.
      if ($value) 
         return 1; // Poprawne.
      else
         return 0; // Niepoprawne.
   }
   
   private function validatePlec($value)
   {
      // Użytkownik musi podać płeć.
      return ($value == '0') ? 0 : 1;
   }
   
    private function validateEmail($value)
   {
      // Poprawne formaty adresu e-mail: *@*.*, *@*.*.*, *.*@*.*, *.*@*.*.*)
      if(!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i', $value))
		  {
			  return 0;  // zly format
		  }
		  else
		  {
			 
	         $sql = 'SELECT user_email FROM chat_user WHERE user_email="' . $value .'"'; 												
	         $log = $this->db_conn->prepare($sql);
	         $log->bindParam(':user_email', $value, PDO::PARAM_STR);
	         $result = $log->execute();
	         $rows = $log->fetchAll();
	         $n = count($rows);
			 
	         if ($n == 1)
			 {
               return 0;
			 }
             else
			 {
               return 1; // Poprawne. 
			 }
			}
    }
	
	private function validatePass($value)
   {
      // trim and escape input value      
      $value = trim($value);
      // Użytkownik nie może pozostawić pustego pola.
      if ($value) 
         return 1; // Poprawne.
      else
         return 0; // Niepoprawne.
   }
   
}

?>