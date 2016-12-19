<?php
if(!defined('PATH_SYSTEM')) die('Bad requested!');

	/**
	* 
	*/
	class BaseController extends Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}

		public function __destruct(){
			$this->view->show();
		}
	}

?>