<?php
if(!defined('PATH_SYSTEM')) die('Bad requested!');

	/**
	* 
	*/
	class Event extends Model
	{	
/*		protected $conn = null;*/

		public function __construct()
		{
			parent::__construct();
		}

		public function getAllEvent(){
			$sql = "SELECT * FROM event";
			$result = $this->conn->query($sql);
			return $result;
		}

		public function getListAge(){
			$sql = "SELECT * FROM event WHERE type = 1";
			$result = $this->conn->query($sql);
			return $result;
		}

		public function getListSex(){
			$sql = "SELECT * FROM event WHERE type = 2";
			$result = $this->conn->query($sql);
			return $result;
		}

		public function getListCharacters(){
			$sql = "SELECT * FROM event WHERE type = 3";
			$result = $this->conn->query($sql);
			return $result;
		}

		public function getListDesire(){
			$sql = "SELECT * FROM event WHERE type = 4";
			$result = $this->conn->query($sql);
			return $result;
		}

		public function delEvent($id){
			$sql = "DELETE FROM event WHERE idevent = ".$id;
			if($this->conn->query($sql) == TRUE){
				return 1;
			}
			else return 2;
		}

		public function editEvent($id, $content){
			$sql = "UPDATE event SET content='".$content."' WHERE idevent =".$id;
			if($this->conn->query($sql) == TRUE){
				return 1;
			}
			else return 2;
		}

		public function getMaxCodeByType($type){
			$sql = "SELECT evencode FROM event WHERE type = ".$type." ORDER BY evencode DESC";
			$result = $this->conn->query($sql);
			$code = (int) $result->fetch_array()[0];
			return $code;
		}

		public function addEvent($type, $evencode, $content){
			$sql = "INSERT INTO event(evencode, content, type) VALUES (".$evencode.", '".$content."',".$type.")";
			if($this->conn->query($sql) == TRUE){
				return 1;
			}
			else return 2;
		}

		public function getContentByEventCode($evencode){
			$sql = "SELECT content FROM event WHERE evencode =".$evencode;
			$result = $this->conn->query($sql);
			$content = $result->fetch_array()[0];
			return $content;
		}
	}
?>