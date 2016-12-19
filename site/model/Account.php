<?php
if(!defined('PATH_SYSTEM')) die('Bad requested!');

	/**
	* 
	*/
	class Account extends Model
	{	
		public function __construct(){
			parent::__construct();
		}

		public function getUserByUsername($username){
			$sql = "SELECT * FROM accounts WHERE username = '".$username."'";
			$result = $this->conn->query($sql);
			return $result;
		}

	}


?>