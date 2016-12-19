<?php
	if(!defined('PATH_SYSTEM')) die('Bad requested!');

	/**
	* 
	*/
	class Model
	{	
		protected $conn = null;

		public function __construct()
		{
			$this->conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
			mysqli_set_charset($this->conn, 'UTF8');
			if($this->conn->connect_error){
				die("Kết nối đến cơ sở dữ liệu thất bại: ".$conn->connect_error);
			}
		}
	}
?>