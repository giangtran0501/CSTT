<?php
if(!defined('PATH_SYSTEM')) die('Bad requested!');

	/**
	* 
	*/
	class Condition extends Model
	{	
		public function __construct(){
			parent::__construct();
		}

		public function get1Dk(){
			$sql = "SELECT * FROM conditions WHERE ".
						"(age = 0 AND sex = 0 AND characters = 0 AND desire != 0) ".
						"OR (age = 0 AND sex = 0 AND characters != 0 AND desire = 0) ".
						"OR (age = 0 AND sex != 0 AND characters = 0 AND desire = 0) ".
						"OR (age != 0 AND sex = 0 AND characters = 0 AND desire = 0)";
			$result = $this->conn->query($sql);
			return $result;
		}

		public function get2Dk(){
			$sql = $sql = "SELECT * FROM conditions WHERE ".
						"(age = 0 AND sex = 0 AND characters != 0 AND desire != 0) ".
						"OR (age = 0 AND sex != 0 AND characters = 0 AND desire != 0) ".
						"OR (age != 0 AND sex = 0 AND characters = 0 AND desire != 0) ".
						"OR (age = 0 AND sex != 0 AND characters != 0 AND desire = 0) ".
						"OR (age != 0 AND sex = 0 AND characters != 0 AND desire = 0) ".
						"OR (age != 0 AND sex != 0 AND characters = 0 AND desire = 0)";
			$result = $this->conn->query($sql);
			return $result;
		}

		public function get3Dk(){
			$sql = $sql = "SELECT * FROM conditions WHERE ".
						"(age = 0 AND sex != 0 AND characters != 0 AND desire != 0) ".
						"OR (age != 0 AND sex = 0 AND characters != 0 AND desire != 0) ".
						"OR (age != 0 AND sex != 0 AND characters = 0 AND desire != 0) ".
						"OR (age != 0 AND sex != 0 AND characters != 0 AND desire = 0)";
			$result = $this->conn->query($sql);
			return $result;
		}

		public function get4Dk(){
			$sql = $sql = "SELECT * FROM conditions WHERE ".
						"(age != 0 AND sex != 0 AND characters != 0 AND desire != 0)";
			$result = $this->conn->query($sql);
			return $result;
		}

		public function getContentByCode($code){
			$sql = "SELECT content FROM event WHERE evencode =".$code;
			$result = $this->conn->query($sql);
			$content = $result->fetch_array()[0];
			return $content;
		}

		public function delCondition($idcondition){
			$sql = "DELETE FROM conditions WHERE idcondition = ".$idcondition;
			if($this->conn->query($sql) == TRUE){
				return 1;
			}
			else return 2;
		}

		public function getIdCondition($age, $sex, $character, $desire){
			$sql = "SELECT idcondition FROM conditions WHERE age = ".$age." AND sex = ".$sex." AND characters = ".$character." AND desire = ".$desire.";";
			$result = $this->conn->query($sql);
			if($result == TRUE){
				return (int) $result->fetch_array()[0];
			}
			else{
				return 0;
			}
		}

		public function addCondition($age, $sex, $character, $desire, $name_pro){
			$sql = "INSERT INTO conditions(age, sex, characters, desire, name_pro) VALUES (".$age.", ".$sex.", ".$character.", ".$desire.",'".$name_pro."')";
			if($this->conn->query($sql) == TRUE){
				return $this->conn->insert_id;
			}
			else return 2;
		}
	}


?>