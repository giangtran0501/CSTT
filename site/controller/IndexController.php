<?php
	if(!defined('PATH_SYSTEM')) die('Bad requested!');

	/**
	* 
	*/
	class IndexController extends BaseController
	{
		
		public function indexAction(){
			$this->model->load('event');
			$age = $this->model->event->getListAge();
			$sex = $this->model->event->getListSex();
			$characters = $this->model->event->getListCharacters();
			$desire = $this->model->event->getListDesire();
			$data = array(
				'age' => $age,
				'sex' => $sex,
				'characters' =>$characters,
				'desire' => $desire
			);
			$this->view->load('index', $data);
		}
	}
?>