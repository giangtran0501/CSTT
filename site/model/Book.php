<?php
if(!defined('PATH_SYSTEM')) die('Bad requested!');

	/**
	* 
	*/
	class Book extends Model
	{	
		public function __construct(){
			parent::__construct();
		}

		public function getBookId($age, $sex, $character, $desire){
			/* Get idcondition */
			$sql = "SELECT idcondition FROM conditions WHERE age = ".$age." AND sex = ".$sex." AND characters = ".$character." AND desire = ".$desire.";";
			$result = $this->conn->query($sql);
			$idcondition = (int) $result->fetch_array()[0];
			/* Get books id */
			$sql = "SELECT bookid FROM rule WHERE conditionid = ".$idcondition.";";
			$idbook = $this->conn->query($sql);
			return $idbook;
		}

		public function getListBook($bookId){
			$listBooks = array();
			foreach ($bookId as $b) {
				$sql = "SELECT * FROM book WHERE idbook = ".$b['bookid'].";";
				$result = $this->conn->query($sql);
				$book = $result->fetch_array(MYSQLI_ASSOC);
				array_push($listBooks, $book);
			}
			return $listBooks;
		}

		public function getBookIdByIdCondition($idcondition){
			$sql = "SELECT bookid FROM rule WHERE conditionid = ".$idcondition.";";
			$idbook = $this->conn->query($sql);
			return $idbook;
		}

		public function getAllBook(){
			$sql = "SELECT * FROM book";
			$result = $this->conn->query($sql);
			return $result;
		}

		public function delBookFromRule($idcondition, $idbook){
			$sql = "DELETE FROM rule WHERE conditionid = ".$idcondition." AND bookid = ".$idbook;
			if($this->conn->query($sql) == TRUE){
				return 1;
			}
			else return 2;
		}

		public function addBookToRule($idcondition, $idbook){
			$sql = "INSERT INTO rule(conditionid, bookid) VALUES (".$idcondition.", ".$idbook.")";
			if($this->conn->query($sql) == TRUE){
				return 1;
			}
			else return $this->conn->error;
		}
	}


?>