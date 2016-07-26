<?php 

require_once('error_handler.php'); 
require_once('dbconnection.class.php');

class Priv extends dbConnection
{
	
   public function checkPrivateChat($tab)
   {
           
           
	   $table = "%".$tab."%";
	   $privtable = array();
	   
	   
	   
	   $q = "SHOW TABLES IN priv789_czatokno LIKE '".$table."'";
	   $z = $this->db_conn->query($q);
	   
           while($rows = $z->fetch())  // zapisuje do tablicy
	   {
		  $privtable[] = $rows[0];
	   }
	   
	   foreach($privtable as $key => $value)
	   {
		   $id = "priv_id".$key; 
                   $function = "clickPriv(".$key.");";		   
		   echo "<a type='button' id='".$id."' class='btn_priv btn btn-primary btn-xs' href='#' value='".$value."' onclick='".$function."'>" .$value. "</a>  ";
	   }
	   
	   
	   
	   
	   
	   
	   
	   
	   // sprawdzenie, czy istnieje w bazie tabela $tab
	   // jesli istnieje tworzy sie tablica do ktorej wpisuje sie nazwy tabela
	   // a nastepnie w postaci buttonow wyrzuca na ekran
   }
   
   public function setNewTable($nick1, $nick2)
   { // najpierw sprawdzenie czy nie istnieje juz tabela w bazie
       
	   $privroom = $nick1."_".$nick2;  // np artbax i ula
	   
	   $room = $nick2."_".$nick1;  // ula i artbax
	   $a = "SHOW TABLES IN priv789_czatokno LIKE '".$room."'";  
	   $b = $this->db_conn->query($a);
	   $rows = $b->fetchAll(); 
	   $n = count($rows);
	   
	   if($n != 0)
	   {
		 header('Location: http://www.czatokno.warszawa.pl');
		 
        }
	   else
	   {
             $r = "CREATE TABLE IF NOT EXISTS $privroom(
             id_room int(11) NOT NULL,
             user_room varchar(30) NOT NULL,
             message_room text NOT NULL,
             date_room datetime NOT NULL,
             bold_room varchar(30) NOT NULL,
             italic_room varchar(30) NOT NULL,
             underline_room varchar(30) NOT NULL,
             color_room varchar(30) NOT NULL
             )";  
			 
	   $s = $this->db_conn->exec($r);
	   header('Location: http://www.czatokno.warszawa.pl');
	   }
   }   
	
}





?>