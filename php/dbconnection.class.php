<?php 

class dbConnection
{
	protected $db_conn;
	
	public function __construct() 
    { 
      
      try 
      {
		require_once('db.php');
		
        $this->db_conn = new PDO('mysql:host='.$host.';dbname='.$dbase, $usr, $pass);
		$this->db_conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		
            
      }
      catch(DBException $e) 
      {
        echo 'The connection can not be created: ' . $e->getMessage();
      }         
   }
   
   public function __destruct() 
   {
       $this->db_conn = null;
   }
}




?>