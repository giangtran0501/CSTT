<?php
	if(!defined('PATH_SYSTEM')) die('Bad requested!');

	/**
	* 
	*/

	class SuggestController extends BaseController
	{
		
		public function indexAction(){
			$this->model->load('book');
			$bookid = $this->model->book->getBookId($_POST['age'], $_POST['sex'], $_POST['characters'], $_POST['desire']);
			$listBooks = $this->model->book->getListBook($bookid);
			$data = array(
				'listBooks' => $listBooks,
			);
			$this->view->load('result', $data);
		}
	}
?>