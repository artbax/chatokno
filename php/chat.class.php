<?php 

require_once('error_handler.php');
require_once('dbconnection.class.php');
   
class Chat extends dbConnection
{
	
   public function sendMessage($user, $message, $date, $bold, $italic, $underline, $color, $target)  // $target to nazwa tabeli main_room
	{
	   
        	   
	   $sql = "INSERT INTO $target (user_room, message_room, date_room, bold_room, italic_room, underline_room, color_room) VALUES ( :user_room, :message_room, :date_room, :bold_room, :italic_room, :underline_room, :color_room )";
	   
       $log = $this->db_conn->prepare($sql);
       $log->bindValue(':user_room', $user, PDO::PARAM_STR);
       $log->bindValue(':message_room', $message, PDO::PARAM_STR); 
       $log->bindValue(':date_room', $date, PDO::PARAM_STR);
       $log->bindValue(':bold_room', $bold, PDO::PARAM_STR);
       $log->bindValue(':italic_room', $italic, PDO::PARAM_STR);
       $log->bindValue(':underline_room', $underline, PDO::PARAM_STR);
       $log->bindValue(':color_room', $color, PDO::PARAM_STR);
       $log->execute();
       $log->closeCursor();	
       
      
	   
	   
	}
	
	public function loadChat($target) // $target to nazwa tablicy
	{
		// sprawdzenie czy tablica istnieje w bazie
		$w = "SHOW TABLES IN priv789_czatokno LIKE '".$target."'";
	        $result = $this->db_conn->query($w);
		$rows = $result->fetch();  // zmienilem na fetchAll
		$n = count($rows);
		
		if($n != 0)
		{
		
		
		$query = "SELECT id_room, user_room, message_room, date_room, bold_room, italic_room, underline_room, color_room FROM 
(SELECT id_room, user_room, message_room, date_room, bold_room, italic_room, underline_room, color_room FROM $target ORDER BY id_room DESC LIMIT 40 ) tmp ORDER BY tmp.id_room";

                
                $q = $this->db_conn->query($query);
                
                //$result = $row = $q->fetchAll();
                //var_dump($result);
		
		$response = array();
		$response['messages'] = array();
		
		while($row = $q->fetch()) // zmienilem na fetchAll
                {
	            $message = array();
                    $message['name'] = $row['user_room'];
                    $message['post'] = $row['message_room'];
                    $message['time'] = $row['date_room'];
	            $message['color'] = $row['color_room'];
	            $message['italic'] = $row['italic_room']; 
	            $message['underline'] = $row['underline_room'];
	            $message['bold'] = $row['bold_room'];
                    
	            array_push($response['messages'],$message);
                }
		
		
		return $response;
		}
		
		
		
		
		
	}
	
	public function chatBot()
	{
		$e = "SELECT id_room, message_room FROM main_room ORDER BY id_room DESC LIMIT 1";
		$sel = $this->db_conn->query($e);
		while($rows = $sel->fetch())
		{
			
			
		$string = $rows['message_room'];
		$string = $string." ";
		$length = strlen($string);
		$tab = array();
		$str = " ";
		
		for($i = 0; $i < $length; $i++)
        {
	       $str = $str.$string[$i];
	       if($string[$i] == " ")
	       {
		      $tab[] = $str;
              $str = " ";		 
	       }
	  
	  
        }
		$len = count($tab);
		for($j = 0; $j < $len; $j++)
        {
            
	        $w = "SELECT chatbot_word, chatbot_sentence FROM chatbot WHERE chatbot_word ='".trim($tab[$j])."'";
			var_dump($tab[$j]);
	        $s = $this->db_conn->query($w);
	        while($r = $s->fetch())
	        {
				     require_once('tables.php');
		             $nick = $tabofnick[rand(0, 3)];
		             $time = date("Y-m-d H:i:s");
		             $bold =  $tabofbold[rand(0, 1)];
		             $italic =  $tabofitalic[rand(0, 1)];
		             $underline = $tabofunderline[rand(0, 1)];
		             $color = $tabofcolor[rand(0, 12)];
		             $target = 'main_room';
					 
					 $post = $r['chatbot_sentence'];
		             self::sendMessage($nick, $post, $time, $bold, $italic, $underline, $color, $target);
		  
	        }
	  
        } 
			
			
			
		}
			
	}
	
	
	
	/*public function deleteMessages($target)
	{
		$q = "TRUNCATE TABLE $target";
		$result = $this->db_conn->query($q);
		
	}*/
	
	
	
	
	
	
	
}



?>




