<?php
	if(!defined('PATH_SYSTEM')) die('Bad requested');
	
	class Controller{
		protected $view = null;
		
		protected $model = null;
		
		protected $config = null;
		
		public function __construct(){
			// Loader cho config
		    require_once PATH_SYSTEM.'/core/loader/Config_Loader.php';
		    $this->config   = new Config_Loader();
		    $this->config->load('config');

			// Load View
			require_once PATH_SYSTEM . '/core/loader/View_Loader.php';
			$this->view = new View_Loader();

			// Load Model
			require_once PATH_SYSTEM . '/core/loader/Model_Loader.php';
			$this->model = new Model_Loader();
			
		}
			
	}

?>