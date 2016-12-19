<?php
	if(!defined('PATH_SYSTEM')) die('Bad requested!');

	/**
	* 
	*/
	class InfoController extends BaseController
	{
		
		public function aboutAction(){
			
			$this->view->load('about');

		}
	}
?>