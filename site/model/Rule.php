<?php
if(!defined('PATH_SYSTEM')) die('Bad requested!');

	/**
	* 
	*/
	class Rule extends Model
	{	
		public function __construct()
		{
			parent::__construct();
		}

		public function delRule($idcondition){
			$sql = "DELETE FROM rule WHERE conditionid = ".$idcondition;
			if($this->conn->query($sql) == TRUE){
				return 1;
			}
			else return 2;
		}
	}
?>