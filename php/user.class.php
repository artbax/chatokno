<?php 

require_once('error_handler.php');
require_once('dbconnection.class.php');

class User extends dbConnection
{
	
   public function loadUsersOnline()
	{
		$sql = "SELECT chat_user.user_id, chat_user.user_date, chat_user.user_nick, chat_user.user_imie, chat_user.user_nazwisko, sex.sex_name, chat_user.user_description, chat_user.user_email,  chat_user.user_small_avatar FROM chat_user 
		LEFT JOIN sex
		ON chat_user.user_sex = sex_id
		WHERE user_status = 1";
		
		$q = $this->db_conn->query($sql);
		
		$answer = array();
		$answer['usersonline'] = array();
		
		while($row = $q->fetch())
        {
	         $users = array();
			$users['id'] = $row['user_id'];
			$users['date'] = $row['user_date'];
			$users['nick'] = $row['user_nick'];
            $users['imie'] = $row['user_imie'];
            $users['nazwisko'] = $row['user_nazwisko'];
			$users['sex'] = $row['sex_name'];
			$users['description'] = $row['user_description'];
			$users['email'] = $row['user_email'];
			$users['avatar_small'] = $row['user_small_avatar'];
			
                    
		    array_push($answer['usersonline'],$users);
        }
		
		return $answer;
		
	}
	
	public function loggingOut($email)
	{
		
	         $q = "UPDATE chat_user SET user_status = 0 WHERE user_email = '".$email."'";  //wylogowanie
	         $result = $this->db_conn->query($q);
	         
	                if(isset($_SESSION['user_nick']))
	                {
	                $delete = "%".$_SESSION['user_nick']."%";
	                $privchat = array();
			 
	                $w = "SHOW TABLES IN priv789_czatokno LIKE '".$delete."'";
	                $z = $this->db_conn->query($w);
	   
	                while($rows = $z->fetch())
	                {
		            $privchat[] = $rows[0];   
	                }
	   
	                foreach($privchat as $value)  
	                {
		            $p = "DROP TABLE $value";
			    $r = $this->db_conn->exec($p);
		   
	                }
	                }
	         
	          
			 // dopisac zapytania usuwajace z bazy wszystkie tablice z nickiem w nazwie
		
		 
			 
			 $_SESSION['access'] = false;
			 unset($_SESSION['user_nick']); ;
                         unset($_SESSION['user_email']);
			 $_SESSION = array();
			 session_unset();
                         session_destroy();
			 header('Location: http://www.czatokno.warszawa.pl');	
	
	}
	
	public function allUsersList()
	{
		$c = "SELECT chat_user.user_id, chat_user.user_nick, chat_user.user_email, status.status_name FROM chat_user
		LEFT JOIN status
		ON chat_user.user_status = status_id
		ORDER BY user_id";
		$sel = $this->db_conn->query($c);
		while($result = $sel->fetch())
		{
			$classid = "email".$result['user_id'];
			$function = "openEmailForm(".$result['user_id'].")";
			echo "<input type='hidden' class='".$result['user_id']."' value='".$result['user_id']."'>";
			echo "<tr><td>".$result['user_nick']."</td><td>  <a href='#' class='".$classid."' onclick='".$function."' value='".$result['user_email']."'>email</a></td>";
			if($result['status_name'] == 'online')
			{
			   echo "<td class='online'>online</td></tr>";
			}
			else
			{
			   echo "<td class='offline'>offline</td></tr>";
			}
			
		}
	}
	
	public function emailAndPass($email, $pass)  // logowanie
	{
		if (isset($email) && isset($pass))
        {
            
           $salt = "378570bdf03b25c8efa9bfdcfb64f99e";
           $hash = hash_hmac('md5', $pass, $salt); 
		   
		   
           $sql = "SELECT user_email, user_pass, user_status FROM chat_user WHERE user_email = ? AND  user_pass = ?";
           $log = $this->db_conn->prepare($sql);
		   
		   $log->execute(array($email, $hash));
           $rows = $log->fetchAll();
   
           $n = count($rows);
           if($n == 1)
           {
	         $q = "UPDATE chat_user SET user_status = 1 WHERE user_email = '".$email."'";
			 $result = $this->db_conn->query($q);
			 
			 $u = "SELECT user_nick FROM chat_user WHERE user_email= '".$email."'";
			 $w = $this->db_conn->query($u);
			 while($row = $w->fetch())
             {
				 $nickname = $row['user_nick'];
			 }
				 
			 
			 
			 
			 session_start();
			 $_SESSION['access'] = true;
			 $_SESSION['user_nick'] = $nickname;
			 $_SESSION['user_email'] = $email;
			 header('Location: http://www.czatokno.warszawa.pl');
	       }
		   else
            {
			  session_start();
	          $_SESSION['access'] = false;
			  $_SESSION['user_nick'] = null;
              $_SESSION['user_email'] = null;
              header('Location: http://www.czatokno.warszawa.pl'); 
            }
   
        }
          else
          {
			session_start();
	        $_SESSION['access'] = false;
			$_SESSION['user_nick'] = null;
            $_SESSION['user_email'] = null;
	        header('Location: http://www.czatokno.warszawa.pl');
           }

	}
	
	public function addDescription($who, $what)
	{
		$c = "UPDATE chat_user SET user_description = :user_description WHERE user_nick = :user_nick";
		$upd = $this->db_conn->prepare($c);
		$upd->bindParam(':user_nick', $_POST['add_description'], PDO::PARAM_STR); 
        $upd->bindParam(':user_description', $_POST['description_content'], PDO::PARAM_STR);
		$upd->execute();
		
	}
	
	public function loadAvatar($user)
	{
		$d = "SELECT user_big_avatar FROM chat_user WHERE user_nick = '".$user."'";
		$sel = $this->db_conn->query($d);
		while($result = $sel->fetch())
		{
			echo "<img class='user_photo img-circle' src='".$result['user_big_avatar']."' />";
		}
	}
	
	public function updateAvatar($nick, $small_avatar, $big_avatar)
	{
		$d = "UPDATE chat_user SET user_small_avatar = :user_small_avatar, user_big_avatar =:user_big_avatar WHERE user_nick =:user_nick";
		$upd = $this->db_conn->prepare($d);
		$upd->bindParam(':user_nick', $nick, PDO::PARAM_STR); 
        $upd->bindParam(':user_small_avatar', $small_avatar, PDO::PARAM_STR); 
		$upd->bindParam(':user_big_avatar', $big_avatar, PDO::PARAM_STR);
		$upd->execute();
	}
}



?>