<?php
if(!defined('PATH_SYSTEM')) die('Bad requested!');

	/**
	* 
	*/
	class Model_Loader
	{

		public function load($model){

			if ( empty($this->{$model}) )
	        {
				$class = ucfirst($model);
				require_once(PATH_APPLICATION.'/model/'.$class.'.php');
				$this->{$model} = new $class();
			}
		}
	}

?>