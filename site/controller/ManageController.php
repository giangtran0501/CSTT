<?php
if(!defined('PATH_SYSTEM')) die('Bad requested!');
session_start();
/**
* 
*/
class ManageController extends BaseController
{
	
	public function loginAction()
	{
		if(isset($_SESSION['name'])){
			header("Location: http://localhost/cstt/index.php?c=manage&a=manage");
		}
		$this->view->load('login_expert');
	}

	public function loginhandleAction(){
		//Khai báo sử dụng session
		// session_start();
		 
		//Khai báo utf-8 để hiển thị được tiếng việt
		header('Content-Type: text/html; charset=UTF-8');

		$message = '';

		if(isset($_POST['btn-login'])){
			$this->model->load('account');
			$username = addslashes($_POST['username']);
			$password = addslashes($_POST['password']);

			$user = $this->model->account->getUserByUsername($username);

			if(mysqli_num_rows($user) == 0){
				$message = "Tên đăng nhập không tồn tại!!!";
				$data = array(
					'mess' => $message
				);
				$this->view->load('login_expert', $data);
			}

			$row = mysqli_fetch_array($user);

			if($password != $row['password']){
				$message = "Mật khẩu không đúng! Vui lòng nhập lại.";
				$data = array(
					'mess' => $message
				);
				$this->view->load('login_expert', $data);
			}

			$_SESSION['name'] = $row['name'];
			header("Location: http://localhost/cstt/index.php?c=manage&a=manage");
		}
	}

	public function manageAction(){
		/*-------------------- Luật một điều kiện ------------------*/
		$this->model->load('condition');
		$dk1 = $this->model->condition->get1Dk();
		$ev1 = array();
		$b1 = array();
		foreach ($dk1 as $d1) {
			if($d1['age'] != 0 && $d1['sex'] == 0 && $d1['characters'] == 0 & $d1['desire'] == 0){
				$content = $this->model->condition->getContentByCode($d1['age']);
				$d = array();
				$d['id'] = $d1['idcondition'];
				$d['event'] = $content;
				array_push($ev1, $d);
			}
			if($d1['age'] == 0 && $d1['sex'] != 0 && $d1['characters'] == 0 & $d1['desire'] == 0){
				$content = $this->model->condition->getContentByCode($d1['sex']);
				$d = array();
				$d['id'] = $d1['idcondition'];
				$d['event'] = $content;
				array_push($ev1, $d);
			}
			if($d1['age'] == 0 && $d1['sex'] == 0 && $d1['characters'] != 0 & $d1['desire'] == 0){
				$content = $this->model->condition->getContentByCode($d1['characters']);
				$d = array();
				$d['id'] = $d1['idcondition'];
				$d['event'] = $content;
				array_push($ev1, $d);
			}
			if($d1['age'] == 0 && $d1['sex'] == 0 && $d1['characters'] == 0 & $d1['desire'] != 0){
				$content = $this->model->condition->getContentByCode($d1['desire']);
				$d = array();
				$d['id'] = $d1['idcondition'];
				$d['event'] = $content;
				array_push($ev1, $d);
			}
			$this->model->load('book');
			$bookid = $this->model->book->getBookIdByIdCondition($d1['idcondition']);
			$listBooks = $this->model->book->getListBook($bookid);
			$b = array();
			$b['idcondition'] = $d1['idcondition'];
			$b['books'] = $listBooks;
			array_push($b1, $b);
		}
		/*-----------------------/Luật 1 điều kiện---------------------------*/
		/*-----------------------Luật 2 điều kiện---------------------------*/
		$this->model->load('condition');
		$dk2 = $this->model->condition->get2Dk();
		$ev2 = array();
		$b2 = array();
		foreach ($dk2 as $d2) {
			if($d2['age'] != 0 && $d2['sex'] != 0 && $d2['characters'] == 0 & $d2['desire'] == 0){
				$content = $this->model->condition->getContentByCode($d2['age'])." AND ".$this->model->condition->getContentByCode($d2['sex']);
				$d = array();
				$d['id'] = $d2['idcondition'];
				$d['event'] = $content;
				array_push($ev2, $d);
			}
			if($d2['age'] != 0 && $d2['sex'] == 0 && $d2['characters'] != 0 & $d2['desire'] == 0){
				$content = $this->model->condition->getContentByCode($d2['age'])." AND ".$this->model->condition->getContentByCode($d2['characters']);
				$d = array();
				$d['id'] = $d2['idcondition'];
				$d['event'] = $content;
				array_push($ev2, $d);
			}
			if($d2['age'] != 0 && $d2['sex'] == 0 && $d2['characters'] == 0 & $d2['desire'] != 0){
				$content = $this->model->condition->getContentByCode($d2['age'])." AND ".$this->model->condition->getContentByCode($d2['desire']);
				$d = array();
				$d['id'] = $d2['idcondition'];
				$d['event'] = $content;
				array_push($ev2, $d);
			}
			if($d2['age'] == 0 && $d2['sex'] != 0 && $d2['characters'] != 0 & $d2['desire'] == 0){
				$content = $this->model->condition->getContentByCode($d2['sex'])." AND ".$this->model->condition->getContentByCode($d2['characters']);
				$d = array();
				$d['id'] = $d2['idcondition'];
				$d['event'] = $content;
				array_push($ev2, $d);
			}
			if($d2['age'] == 0 && $d2['sex'] != 0 && $d2['characters'] == 0 & $d2['desire'] != 0){
				$content = $this->model->condition->getContentByCode($d2['sex'])." AND ".$this->model->condition->getContentByCode($d2['desire']);
				$d = array();
				$d['id'] = $d2['idcondition'];
				$d['event'] = $content;
				array_push($ev2, $d);
			}
			if($d2['age'] == 0 && $d2['sex'] == 0 && $d2['characters'] != 0 & $d2['desire'] != 0){
				$content = $this->model->condition->getContentByCode($d2['characters'])." AND ".$this->model->condition->getContentByCode($d2['desire']);
				$d = array();
				$d['id'] = $d2['idcondition'];
				$d['event'] = $content;
				array_push($ev2, $d);
			}
			$this->model->load('book');
			$bookid = $this->model->book->getBookIdByIdCondition($d2['idcondition']);
			$listBooks = $this->model->book->getListBook($bookid);
			$b = array();
			$b['idcondition'] = $d2['idcondition'];
			$b['books'] = $listBooks;
			array_push($b2, $b);
		}
		/*-----------------------/Luật 2 điều kiện---------------------------*/
		/*-----------------------Luật 3 điều kiện---------------------------*/
		$this->model->load('condition');
		$dk3 = $this->model->condition->get3Dk();
		$ev3 = array();
		$b3 = array();
		foreach ($dk3 as $d3) {
			if($d3['age'] != 0 && $d3['sex'] != 0 && $d3['characters'] != 0 & $d3['desire'] == 0){
				$content = $this->model->condition->getContentByCode($d3['age'])." AND ".
							$this->model->condition->getContentByCode($d3['sex'])." AND ".
							$this->model->condition->getContentByCode($d3['characters']);
				$d = array();
				$d['id'] = $d3['idcondition'];
				$d['event'] = $content;
				array_push($ev3, $d);
			}
			if($d3['age'] != 0 && $d3['sex'] != 0 && $d3['characters'] == 0 & $d3['desire'] != 0){
				$content = $this->model->condition->getContentByCode($d3['age'])." AND ".
							$this->model->condition->getContentByCode($d3['sex'])." AND ".
							$this->model->condition->getContentByCode($d3['desire']);
				$d = array();
				$d['id'] = $d3['idcondition'];
				$d['event'] = $content;
				array_push($ev3, $d);
			}
			if($d3['age'] == 0 && $d3['sex'] != 0 && $d3['characters'] != 0 & $d3['desire'] != 0){
				$content = $this->model->condition->getContentByCode($d3['sex'])." AND ".
							$this->model->condition->getContentByCode($d3['characters'])." AND ".
							$this->model->condition->getContentByCode($d3['desire']);
				$d = array();
				$d['id'] = $d3['idcondition'];
				$d['event'] = $content;
				array_push($ev3, $d);
			}
			if($d3['age'] != 0 && $d3['sex'] == 0 && $d3['characters'] != 0 & $d3['desire'] != 0){
				$content = $this->model->condition->getContentByCode($d3['age'])." AND ".
							$this->model->condition->getContentByCode($d3['characters'])." AND ".
							$this->model->condition->getContentByCode($d3['desire']);
				$d = array();
				$d['id'] = $d3['idcondition'];
				$d['event'] = $content;
				array_push($ev3, $d);
			}
			$this->model->load('book');
			$bookid = $this->model->book->getBookIdByIdCondition($d3['idcondition']);
			$listBooks = $this->model->book->getListBook($bookid);
			$b = array();
			$b['idcondition'] = $d3['idcondition'];
			$b['books'] = $listBooks;
			array_push($b3, $b);
		}
		/*-----------------------/Luật 3 điều kiện---------------------------*/
		/*-----------------------Luật 4 điều kiện---------------------------*/
		$this->model->load('condition');
		$dk4 = $this->model->condition->get4Dk();
		$ev4 = array();
		$b4 = array();
		foreach ($dk4 as $d4) {
			$content = $this->model->condition->getContentByCode($d4['age'])." AND ".
						$this->model->condition->getContentByCode($d4['sex'])." AND ".
						$this->model->condition->getContentByCode($d4['characters'])." AND ".
						$this->model->condition->getContentByCode($d4['desire']);
			$d = array();
			$d['id'] = $d4['idcondition'];
			$d['event'] = $content;
			array_push($ev4, $d);

			$this->model->load('book');
			$bookid = $this->model->book->getBookIdByIdCondition($d4['idcondition']);
			$listBooks = $this->model->book->getListBook($bookid);
			$b = array();
			$b['idcondition'] = $d4['idcondition'];
			$b['books'] = $listBooks;
			array_push($b4, $b);
		}
		/*-----------------------/Luật 4 điều kiện---------------------------*/
		/*--------------Lấy các sự kiện----------------*/
		$this->model->load('event');
		$age = $this->model->event->getListAge();
		$sex = $this->model->event->getListSex();
		$characters = $this->model->event->getListCharacters();
		$desire = $this->model->event->getListDesire();
		$allEvent = $this->model->event->getAllEvent();
		$mess = '';
		if(isset($_GET['mess'])){
			$mess = $_GET['mess'];
		}
		$data = array(
			'dk1' => $dk1,
			'ev1' => $ev1,
			'b1'  => $b1,
			'dk2' => $dk2,
			'ev2' => $ev2,
			'b2'  => $b2,
			'dk3' => $dk3,
			'ev3' => $ev3,
			'b3'  => $b3,
			'dk4' => $dk4,
			'ev4' => $ev4,
			'b4'  => $b4,
			'age' => $age,
			'sex' => $sex,
			'characters' => $characters,
			'desire' => $desire,
			'allEvent' => $allEvent,
			'mess' => $mess
		);
		$this->view->load('manage', $data);
	}

	public function logoutAction(){
		if(isset($_SESSION['name'])){
			unset($_SESSION['name']);
		}
		header("Location: http://localhost/cstt/index.php");
	}

	public function eventAction(){
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
		$this->view->load('manage-event', $data);
	}

	public function delEventAction(){
		$id = 0;
		if(isset($_GET['id'])){
			$id = $_GET['id'];
		}

		$this->model->load('event');
		$result = $this->model->event->delEvent($id);
		header("Location: http://localhost/cstt/index.php?c=manage&a=event");
	}

	public function editEventAction(){
		$id = 0;
		$content = '';
		if(isset($_POST['edit'])){
			$id = $_POST['eventid'];
			$content = $_POST['event'];
		}
		$this->model->load('event');
		$this->model->event->editEvent($id, $content);
		header("Location: http://localhost/cstt/index.php?c=manage&a=event");
	}

	public function addEventAction(){
		$type = 0;
		$content = '';
		if(isset($_POST['add'])){
			$type = $_POST['type'];
			$content = $_POST['addevent'];
		}
		$this->model->load('event');
		$maxCode = $this->model->event->getMaxCodeByType($type);
		$newCode = $maxCode + 1;
		$this->model->event->addEvent($type, $newCode, $content);
		header("Location: http://localhost/cstt/index.php?c=manage&a=event");
	}

	public function editRuleAction(){
		$idcondition = $_GET['idcondition'];
		$content = $_GET['content'];
		$this->model->load('book');
		$bookid = $this->model->book->getBookIdByIdCondition($idcondition);
		$listBooks = $this->model->book->getListBook($bookid);
		$allBook = $this->model->book->getAllBook();
		$data = array(
			'idcondition' => $idcondition,
			'content' => $content,
			'lb' => $listBooks,
			'ab' => $allBook
		);
		$this->view->load('editRule', $data);
	}

	public function delBookFromRuleAction(){
		$this->model->load('book');
		$idcondition = $_GET['idcondition'];
		$idbook = $_GET['idbook'];
		$content = $_GET['content'];
		$this->model->book->delBookFromRule($idcondition, $idbook);
		header("Location: http://localhost/cstt/index.php?c=manage&a=editRule&idcondition=".$idcondition."&content=".$content);
	}

	public function addBookToRuleAction(){
		$this->model->load('book');
		$idcondition = $_GET['idcondition'];
		$idbook = $_GET['idbook'];
		$content = $_GET['content'];
		$this->model->book->addBookToRule($idcondition, $idbook);
		header("Location: http://localhost/cstt/index.php?c=manage&a=editRule&idcondition=".$idcondition."&content=".$content);
	}

	public function delRuleAction(){
		$idcondition = $_GET['idcondition'];
		$this->model->load('rule');
		$this->model->rule->delRule($idcondition);
		$this->model->load('condition');
		$this->model->condition->delCondition($idcondition);
		header("Location: http://localhost/cstt/index.php?c=manage&a=manage");
	}

	public function add1DkAction(){
		$con1 = 0;
		if (isset($_POST['add1R'])) {
			if(isset($_POST['con1'])){
				$con1 = $_POST['con1'];
			}
		}
		$type = FLOOR($con1/1000);
		$check = 0;
		if ($type == 1) {
			$this->model->load('condition');
			$check = $this->model->condition->getIdCondition($con1, 0, 0, 0);
			if($check != 0){
				header("Location: http://localhost/cstt/index.php?c=manage&a=manage&mess=Luật%20đã%20tồn%20tại!!!");
			}
			else{
				$idcondition = $this->model->condition->addCondition($con1, 0, 0, 0, $_SESSION['name']);
				$this->model->load('event');
				$content = $this->model->event->getContentByEventCode($con1);
				header("Location: http://localhost/cstt/index.php?c=manage&a=editRule&idcondition=".$idcondition."&content=".$content);
			}
		}
		else if ($type == 2) {
			$this->model->load('condition');
			$check = $this->model->condition->getIdCondition(0, $con1, 0, 0);
			if($check != 0){
				header("Location: http://localhost/cstt/index.php?c=manage&a=manage&mess=Luật%20đã%20tồn%20tại!!!");
			}
			else{

				$idcondition = $this->model->condition->addCondition(0, $con1, 0, 0, $_SESSION['name']);
				$this->model->load('event');
				$content = $this->model->event->getContentByEventCode($con1);
				header("Location: http://localhost/cstt/index.php?c=manage&a=editRule&idcondition=".$idcondition."&content=".$content);
			}
		}
		else if ($type == 3) {
			$this->model->load('condition');
			$check = $this->model->condition->getIdCondition(0, 0, $con1, 0);
			if($check != 0){
				header("Location: http://localhost/cstt/index.php?c=manage&a=manage&mess=Luật%20đã%20tồn%20tại!!!");
			}
			else{
				$idcondition = $this->model->condition->addCondition(0, 0, $con1, 0, $_SESSION['name']);
				$this->model->load('event');
				$content = $this->model->event->getContentByEventCode($con1);
				header("Location: http://localhost/cstt/index.php?c=manage&a=editRule&idcondition=".$idcondition."&content=".$content);
			}
		}
		else{
			$this->model->load('condition');
			$check = $this->model->condition->getIdCondition(0, 0, 0, $con1);
			if($check != 0){
				header("Location: http://localhost/cstt/index.php?c=manage&a=manage&mess=Luật%20đã%20tồn%20tại!!!");
			}
			else{
				$idcondition = $this->model->condition->addCondition(0, 0, 0, $con1, $_SESSION['name']);
				$this->model->load('event');
				$content = $this->model->event->getContentByEventCode($con1);
				header("Location: http://localhost/cstt/index.php?c=manage&a=editRule&idcondition=".$idcondition."&content=".$content);
			}
		}
	}

	public function add2DkAction(){
		$con1 = 0;
		$con2 = 0;
		if (isset($_POST['add2R'])) {
			if(isset($_POST['con1']) && isset($_POST['con2'])){
				$con1 = $_POST['con1'];
				$con2 = $_POST['con2'];
			}
		}
		$type1 = FLOOR($con1/1000);
		$type2 = FLOOR($con2/1000);
		if ($type1 == $type2) {
			header("Location: http://localhost/cstt/index.php?c=manage&a=manage&mess=Hai%20điều%20kiện%20phải%20khác%20loại.%20Vui%20lòng%20chọn%20lại!!!");
		}
		$check = 0;
		if (($type1 == 1 && $type2 == 2) || ($type1 == 2 && $type2 == 1)) {
			if ($type1 == 1 && $type2 == 2) {
				$this->model->load('condition');
				$check = $this->model->condition->getIdCondition($con1, $con2, 0, 0);
				if($check != 0){
					header("Location: http://localhost/cstt/index.php?c=manage&a=manage&mess=Luật%20đã%20tồn%20tại!!!");
				}
				else{
					$idcondition = $this->model->condition->addCondition($con1, $con2, 0, 0, $_SESSION['name']);
					$this->model->load('event');
					$content = $this->model->event->getContentByEventCode($con1)." AND ".$this->model->event->getContentByEventCode($con2);
					header("Location: http://localhost/cstt/index.php?c=manage&a=editRule&idcondition=".$idcondition."&content=".$content);
				}
			}
			if ($type1 == 2 && $type2 == 1) {
				$this->model->load('condition');
				$check = $this->model->condition->getIdCondition($con2, $con1, 0, 0);
				if($check != 0){
					header("Location: http://localhost/cstt/index.php?c=manage&a=manage&mess=Luật%20đã%20tồn%20tại!!!");
				}
				else{
					$idcondition = $this->model->condition->addCondition($con2, $con1, 0, 0, $_SESSION['name']);
					$this->model->load('event');
					$content = $this->model->event->getContentByEventCode($con2)." AND ".$this->model->event->getContentByEventCode($con1);
					header("Location: http://localhost/cstt/index.php?c=manage&a=editRule&idcondition=".$idcondition."&content=".$content);
				}
			}
		}
		if (($type1 == 1 && $type2 == 3) || ($type1 == 3 && $type2 == 1)) {
			if ($type1 == 1 && $type2 == 3) {
				$this->model->load('condition');
				$check = $this->model->condition->getIdCondition($con1, 0, $con2, 0);
				if($check != 0){
					header("Location: http://localhost/cstt/index.php?c=manage&a=manage&mess=Luật%20đã%20tồn%20tại!!!");
				}
				else{
					$idcondition = $this->model->condition->addCondition($con1, 0, $con2, 0, $_SESSION['name']);
					$this->model->load('event');
					$content = $this->model->event->getContentByEventCode($con1)." AND ".$this->model->event->getContentByEventCode($con2);
					header("Location: http://localhost/cstt/index.php?c=manage&a=editRule&idcondition=".$idcondition."&content=".$content);
				}
			}
			if ($type1 == 3 && $type2 == 1) {
				$this->model->load('condition');
				$check = $this->model->condition->getIdCondition($con2, 0, $con1, 0);
				if($check != 0){
					header("Location: http://localhost/cstt/index.php?c=manage&a=manage&mess=Luật%20đã%20tồn%20tại!!!");
				}
				else{
					$idcondition = $this->model->condition->addCondition($con2, 0, $con1, 0, $_SESSION['name']);
					$this->model->load('event');
					$content = $this->model->event->getContentByEventCode($con2)." AND ".$this->model->event->getContentByEventCode($con1);
					header("Location: http://localhost/cstt/index.php?c=manage&a=editRule&idcondition=".$idcondition."&content=".$content);
				}
			}
		}
		if (($type1 == 1 && $type2 == 4) || ($type1 == 4 && $type2 == 1)) {
			if ($type1 == 1 && $type2 == 4) {
				$this->model->load('condition');
				$check = $this->model->condition->getIdCondition($con1, 0, 0, $con2);
				if($check != 0){
					header("Location: http://localhost/cstt/index.php?c=manage&a=manage&mess=Luật%20đã%20tồn%20tại!!!");
				}
				else{
					$idcondition = $this->model->condition->addCondition($con1, 0, 0, $con2, $_SESSION['name']);
					$this->model->load('event');
					$content = $this->model->event->getContentByEventCode($con1)." AND ".$this->model->event->getContentByEventCode($con2);
					header("Location: http://localhost/cstt/index.php?c=manage&a=editRule&idcondition=".$idcondition."&content=".$content);
				}
			}
			if ($type1 == 4 && $type2 == 1) {
				$this->model->load('condition');
				$check = $this->model->condition->getIdCondition($con2, 0, 0, $con1);
				if($check != 0){
					header("Location: http://localhost/cstt/index.php?c=manage&a=manage&mess=Luật%20đã%20tồn%20tại!!!");
				}
				else{
					$idcondition = $this->model->condition->addCondition($con2, 0, 0, $con1, $_SESSION['name']);
					$this->model->load('event');
					$content = $this->model->event->getContentByEventCode($con2)." AND ".$this->model->event->getContentByEventCode($con1);
					header("Location: http://localhost/cstt/index.php?c=manage&a=editRule&idcondition=".$idcondition."&content=".$content);
				}
			}
		}
		if (($type1 == 2 && $type2 == 3) || ($type1 == 3 && $type2 == 2)) {
			if ($type1 == 2 && $type2 == 3) {
				$this->model->load('condition');
				$check = $this->model->condition->getIdCondition(0, $con1, $con2, 0);
				if($check != 0){
					header("Location: http://localhost/cstt/index.php?c=manage&a=manage&mess=Luật%20đã%20tồn%20tại!!!");
				}
				else{
					$idcondition = $this->model->condition->addCondition(0, $con1, $con2, 0, $_SESSION['name']);
					$this->model->load('event');
					$content = $this->model->event->getContentByEventCode($con1)." AND ".$this->model->event->getContentByEventCode($con2);
					header("Location: http://localhost/cstt/index.php?c=manage&a=editRule&idcondition=".$idcondition."&content=".$content);
				}
			}
			if ($type1 == 3 && $type2 == 2) {
				$this->model->load('condition');
				$check = $this->model->condition->getIdCondition(0, $con2, $con1, 0);
				if($check != 0){
					header("Location: http://localhost/cstt/index.php?c=manage&a=manage&mess=Luật%20đã%20tồn%20tại!!!");
				}
				else{
					$idcondition = $this->model->condition->addCondition(0, $con2, $con1, 0, $_SESSION['name']);
					$this->model->load('event');
					$content = $this->model->event->getContentByEventCode($con2)." AND ".$this->model->event->getContentByEventCode($con1);
					header("Location: http://localhost/cstt/index.php?c=manage&a=editRule&idcondition=".$idcondition."&content=".$content);
				}
			}
		}
		if (($type1 == 2 && $type2 == 4) || ($type1 == 4 && $type2 == 2)) {
			if ($type1 == 2 && $type2 == 4) {
				$this->model->load('condition');
				$check = $this->model->condition->getIdCondition(0, $con1, 0, $con2);
				if($check != 0){
					header("Location: http://localhost/cstt/index.php?c=manage&a=manage&mess=Luật%20đã%20tồn%20tại!!!");
				}
				else{
					$idcondition = $this->model->condition->addCondition(0, $con1, 0, $con2, $_SESSION['name']);
					$this->model->load('event');
					$content = $this->model->event->getContentByEventCode($con1)." AND ".$this->model->event->getContentByEventCode($con2);
					header("Location: http://localhost/cstt/index.php?c=manage&a=editRule&idcondition=".$idcondition."&content=".$content);
				}
			}
			if ($type1 == 4 && $type2 == 2) {
				$this->model->load('condition');
				$check = $this->model->condition->getIdCondition(0, $con2, 0, $con1);
				if($check != 0){
					header("Location: http://localhost/cstt/index.php?c=manage&a=manage&mess=Luật%20đã%20tồn%20tại!!!");
				}
				else{
					$idcondition = $this->model->condition->addCondition(0, $con2, 0, $con1, $_SESSION['name']);
					$this->model->load('event');
					$content = $this->model->event->getContentByEventCode($con2)." AND ".$this->model->event->getContentByEventCode($con1);
					header("Location: http://localhost/cstt/index.php?c=manage&a=editRule&idcondition=".$idcondition."&content=".$content);
				}
			}
		}
		if (($type1 == 3 && $type2 == 4) || ($type1 == 4 && $type2 == 3)) {
			if ($type1 == 3 && $type2 == 4) {
				$this->model->load('condition');
				$check = $this->model->condition->getIdCondition(0, 0, $con1, $con2);
				if($check != 0){
					header("Location: http://localhost/cstt/index.php?c=manage&a=manage&mess=Luật%20đã%20tồn%20tại!!!");
				}
				else{
					$idcondition = $this->model->condition->addCondition(0, 0, $con1, $con2, $_SESSION['name']);
					$this->model->load('event');
					$content = $this->model->event->getContentByEventCode($con1)." AND ".$this->model->event->getContentByEventCode($con2);
					header("Location: http://localhost/cstt/index.php?c=manage&a=editRule&idcondition=".$idcondition."&content=".$content);
				}
			}
			if ($type1 == 4 && $type2 == 3) {
				$this->model->load('condition');
				$check = $this->model->condition->getIdCondition(0, 0, $con2, $con1);
				if($check != 0){
					header("Location: http://localhost/cstt/index.php?c=manage&a=manage&mess=Luật%20đã%20tồn%20tại!!!");
				}
				else{
					$idcondition = $this->model->condition->addCondition(0, 0, $con2, $con1, $_SESSION['name']);
					$this->model->load('event');
					$content = $this->model->event->getContentByEventCode($con2)." AND ".$this->model->event->getContentByEventCode($con1);
					header("Location: http://localhost/cstt/index.php?c=manage&a=editRule&idcondition=".$idcondition."&content=".$content);
				}
			}
		}
	}

	public function add3DkAction(){
		$con1 = 0;
		$con2 = 0;
		$con3 = 0;
		if (isset($_POST['add3R'])) {
			if(isset($_POST['con1']) && isset($_POST['con2']) && isset($_POST['con3'])){
				$con1 = $_POST['con1'];
				$con2 = $_POST['con2'];
				$con3 = $_POST['con3'];
			}
		}
		$type1 = FLOOR($con1/1000);
		$type2 = FLOOR($con2/1000);
		$type3 = FLOOR($con3/1000);
		if ($type1 == $type2 || $type1 == $type3 || $type2 == $type3) {
			header("Location: http://localhost/cstt/index.php?c=manage&a=manage&mess=Ba%20điều%20kiện%20phải%20khác%20loại.%20Vui%20lòng%20chọn%20lại!!!");
		}
		$check = 0;
		if ($type1 == 1){
			if(($type2 == 2 && $type3 == 3) || ($type2 == 3 && $type3 == 2)){
				if ($type2 == 2 && $type3 == 3)  {
					$this->model->load('condition');
					$check = $this->model->condition->getIdCondition($con1, $con2, $con3, 0);
					if($check != 0){
						header("Location: http://localhost/cstt/index.php?c=manage&a=manage&mess=Luật%20đã%20tồn%20tại!!!");
					}
					else{
						$idcondition = $this->model->condition->addCondition($con1, $con2, $con3, 0, $_SESSION['name']);
						$this->model->load('event');
						$content = $this->model->event->getContentByEventCode($con1)." AND ".$this->model->event->getContentByEventCode($con2)." AND ".$this->model->event->getContentByEventCode($con3);
						header("Location: http://localhost/cstt/index.php?c=manage&a=editRule&idcondition=".$idcondition."&content=".$content);
					}
				}
				if ($type2 == 3 && $type3 == 2) {
					$this->model->load('condition');
					$check = $this->model->condition->getIdCondition($con1, $con3, $con2, 0);
					if($check != 0){
						header("Location: http://localhost/cstt/index.php?c=manage&a=manage&mess=Luật%20đã%20tồn%20tại!!!");
					}
					else{
						$idcondition = $this->model->condition->addCondition($con1, $con3, $con2, 0, $_SESSION['name']);
						$this->model->load('event');
						$content = $this->model->event->getContentByEventCode($con1)." AND ".$this->model->event->getContentByEventCode($con3)." AND ".$this->model->event->getContentByEventCode($con2);
						header("Location: http://localhost/cstt/index.php?c=manage&a=editRule&idcondition=".$idcondition."&content=".$content);
					}
				}
			}
			if(($type2 == 2 && $type3 == 4) || ($type2 == 4 && $type3 == 2)){
				if ($type2 == 2 && $type3 == 4)  {
					$this->model->load('condition');
					$check = $this->model->condition->getIdCondition($con1, $con2, 0, $con3);
					if($check != 0){
						header("Location: http://localhost/cstt/index.php?c=manage&a=manage&mess=Luật%20đã%20tồn%20tại!!!");
					}
					else{
						$idcondition = $this->model->condition->addCondition($con1, $con2, 0, $con3, $_SESSION['name']);
						$this->model->load('event');
						$content = $this->model->event->getContentByEventCode($con1)." AND ".$this->model->event->getContentByEventCode($con2)." AND ".$this->model->event->getContentByEventCode($con3);
						header("Location: http://localhost/cstt/index.php?c=manage&a=editRule&idcondition=".$idcondition."&content=".$content);
					}
				}
				if ($type2 == 4 && $type3 == 2) {
					$this->model->load('condition');
					$check = $this->model->condition->getIdCondition($con1, $con3, 0, $con2);
					if($check != 0){
						header("Location: http://localhost/cstt/index.php?c=manage&a=manage&mess=Luật%20đã%20tồn%20tại!!!");
					}
					else{
						$idcondition = $this->model->condition->addCondition($con1, $con3, 0, $con2, $_SESSION['name']);
						$this->model->load('event');
						$content = $this->model->event->getContentByEventCode($con1)." AND ".$this->model->event->getContentByEventCode($con3)." AND ".$this->model->event->getContentByEventCode($con2);
						header("Location: http://localhost/cstt/index.php?c=manage&a=editRule&idcondition=".$idcondition."&content=".$content);
					}
				}
			}
			if(($type2 == 3 && $type3 == 4) || ($type2 == 4 && $type3 == 3)){
				if ($type2 == 3 && $type3 == 4)  {
					$this->model->load('condition');
					$check = $this->model->condition->getIdCondition($con1, 0, $con2, $con3);
					if($check != 0){
						header("Location: http://localhost/cstt/index.php?c=manage&a=manage&mess=Luật%20đã%20tồn%20tại!!!");
					}
					else{
						$idcondition = $this->model->condition->addCondition($con1, 0, $con2, $con3, $_SESSION['name']);
						$this->model->load('event');
						$content = $this->model->event->getContentByEventCode($con1)." AND ".$this->model->event->getContentByEventCode($con2)." AND ".$this->model->event->getContentByEventCode($con3);
						header("Location: http://localhost/cstt/index.php?c=manage&a=editRule&idcondition=".$idcondition."&content=".$content);
					}
				}
				if ($type2 == 4 && $type3 == 3) {
					$this->model->load('condition');
					$check = $this->model->condition->getIdCondition($con1, 0, $con3, $con2);
					if($check != 0){
						header("Location: http://localhost/cstt/index.php?c=manage&a=manage&mess=Luật%20đã%20tồn%20tại!!!");
					}
					else{
						$idcondition = $this->model->condition->addCondition($con1, 0, $con3, $con2, $_SESSION['name']);
						$this->model->load('event');
						$content = $this->model->event->getContentByEventCode($con1)." AND ".$this->model->event->getContentByEventCode($con3)." AND ".$this->model->event->getContentByEventCode($con2);
						header("Location: http://localhost/cstt/index.php?c=manage&a=editRule&idcondition=".$idcondition."&content=".$content);
					}
				}
			}
		}
		if ($type1 == 2){
			if(($type2 == 1 && $type3 == 3) || ($type2 == 3 && $type3 == 1)){
				if ($type2 == 1 && $type3 == 3)  {
					$this->model->load('condition');
					$check = $this->model->condition->getIdCondition($con2, $con1, $con3, 0);
					if($check != 0){
						header("Location: http://localhost/cstt/index.php?c=manage&a=manage&mess=Luật%20đã%20tồn%20tại!!!");
					}
					else{
						$idcondition = $this->model->condition->addCondition($con2, $con1, $con3, 0, $_SESSION['name']);
						$this->model->load('event');
						$content = $this->model->event->getContentByEventCode($con2)." AND ".$this->model->event->getContentByEventCode($con1)." AND ".$this->model->event->getContentByEventCode($con3);
						header("Location: http://localhost/cstt/index.php?c=manage&a=editRule&idcondition=".$idcondition."&content=".$content);
					}
				}
				if ($type2 == 3 && $type3 == 1) {
					$this->model->load('condition');
					$check = $this->model->condition->getIdCondition($con3, $con1, $con2, 0);
					if($check != 0){
						header("Location: http://localhost/cstt/index.php?c=manage&a=manage&mess=Luật%20đã%20tồn%20tại!!!");
					}
					else{
						$idcondition = $this->model->condition->addCondition($con3, $con1, $con2, 0, $_SESSION['name']);
						$this->model->load('event');
						$content = $this->model->event->getContentByEventCode($con2)." AND ".$this->model->event->getContentByEventCode($con3)." AND ".$this->model->event->getContentByEventCode($con1);
						header("Location: http://localhost/cstt/index.php?c=manage&a=editRule&idcondition=".$idcondition."&content=".$content);
					}
				}
			}
			if(($type2 == 1 && $type3 == 4) || ($type2 == 4 && $type3 == 1)){
				if ($type2 == 1 && $type3 == 4)  {
					$this->model->load('condition');
					$check = $this->model->condition->getIdCondition($con2, $con1, 0, $con3);
					if($check != 0){
						header("Location: http://localhost/cstt/index.php?c=manage&a=manage&mess=Luật%20đã%20tồn%20tại!!!");
					}
					else{
						$idcondition = $this->model->condition->addCondition($con2, $con1, 0, $con3, $_SESSION['name']);
						$this->model->load('event');
						$content = $this->model->event->getContentByEventCode($con2)." AND ".$this->model->event->getContentByEventCode($con1)." AND ".$this->model->event->getContentByEventCode($con3);
						header("Location: http://localhost/cstt/index.php?c=manage&a=editRule&idcondition=".$idcondition."&content=".$content);
					}
				}
				if ($type2 == 4 && $type3 == 1) {
					$this->model->load('condition');
					$check = $this->model->condition->getIdCondition($con3, $con1, 0, $con2);
					if($check != 0){
						header("Location: http://localhost/cstt/index.php?c=manage&a=manage&mess=Luật%20đã%20tồn%20tại!!!");
					}
					else{
						$idcondition = $this->model->condition->addCondition($con3, $con1, 0, $con2, $_SESSION['name']);
						$this->model->load('event');
						$content = $this->model->event->getContentByEventCode($con2)." AND ".$this->model->event->getContentByEventCode($con3)." AND ".$this->model->event->getContentByEventCode($con1);
						header("Location: http://localhost/cstt/index.php?c=manage&a=editRule&idcondition=".$idcondition."&content=".$content);
					}
				}
			}
			if(($type2 == 3 && $type3 == 4) || ($type2 == 4 && $type3 == 3)){
				if ($type2 == 3 && $type3 == 4)  {
					$this->model->load('condition');
					$check = $this->model->condition->getIdCondition(0, $con1, $con2, $con3);
					if($check != 0){
						header("Location: http://localhost/cstt/index.php?c=manage&a=manage&mess=Luật%20đã%20tồn%20tại!!!");
					}
					else{
						$idcondition = $this->model->condition->addCondition(0, $con1, $con2, $con3, $_SESSION['name']);
						$this->model->load('event');
						$content = $this->model->event->getContentByEventCode($con2)." AND ".$this->model->event->getContentByEventCode($con1)." AND ".$this->model->event->getContentByEventCode($con3);
						header("Location: http://localhost/cstt/index.php?c=manage&a=editRule&idcondition=".$idcondition."&content=".$content);
					}
				}
				if ($type2 == 4 && $type3 == 3) {
					$this->model->load('condition');
					$check = $this->model->condition->getIdCondition(0, $con1, $con3, $con2);
					if($check != 0){
						header("Location: http://localhost/cstt/index.php?c=manage&a=manage&mess=Luật%20đã%20tồn%20tại!!!");
					}
					else{
						$idcondition = $this->model->condition->addCondition(0, $con1, $con3, $con2, $_SESSION['name']);
						$this->model->load('event');
						$content = $this->model->event->getContentByEventCode($con2)." AND ".$this->model->event->getContentByEventCode($con3)." AND ".$this->model->event->getContentByEventCode($con1);
						header("Location: http://localhost/cstt/index.php?c=manage&a=editRule&idcondition=".$idcondition."&content=".$content);
					}
				}
			}
		}
		if ($type1 == 3){
			if(($type2 == 1 && $type3 == 2) || ($type2 == 2 && $type3 == 1)){
				if ($type2 == 1 && $type3 == 2)  {
					$this->model->load('condition');
					$check = $this->model->condition->getIdCondition($con2, $con3, $con1, 0);
					if($check != 0){
						header("Location: http://localhost/cstt/index.php?c=manage&a=manage&mess=Luật%20đã%20tồn%20tại!!!");
					}
					else{
						$idcondition = $this->model->condition->addCondition($con2, $con3, $con1, 0, $_SESSION['name']);
						$this->model->load('event');
						$content = $this->model->event->getContentByEventCode($con2)." AND ".$this->model->event->getContentByEventCode($con3)." AND ".$this->model->event->getContentByEventCode($con1);
						header("Location: http://localhost/cstt/index.php?c=manage&a=editRule&idcondition=".$idcondition."&content=".$content);
					}
				}
				if ($type2 == 2 && $type3 == 1) {
					$this->model->load('condition');
					$check = $this->model->condition->getIdCondition($con3, $con2, $con1, 0);
					if($check != 0){
						header("Location: http://localhost/cstt/index.php?c=manage&a=manage&mess=Luật%20đã%20tồn%20tại!!!");
					}
					else{
						$idcondition = $this->model->condition->addCondition($con3, $con2, $con1, 0, $_SESSION['name']);
						$this->model->load('event');
						$content = $this->model->event->getContentByEventCode($con3)." AND ".$this->model->event->getContentByEventCode($con2)." AND ".$this->model->event->getContentByEventCode($con1);
						header("Location: http://localhost/cstt/index.php?c=manage&a=editRule&idcondition=".$idcondition."&content=".$content);
					}
				}
			}
			if(($type2 == 1 && $type3 == 4) || ($type2 == 4 && $type3 == 1)){
				if ($type2 == 1 && $type3 == 4)  {
					$this->model->load('condition');
					$check = $this->model->condition->getIdCondition($con2, 0, $con1, $con3);
					if($check != 0){
						header("Location: http://localhost/cstt/index.php?c=manage&a=manage&mess=Luật%20đã%20tồn%20tại!!!");
					}
					else{
						$idcondition = $this->model->condition->addCondition($con2, 0, $con1, $con3, $_SESSION['name']);
						$this->model->load('event');
						$content = $this->model->event->getContentByEventCode($con2)." AND ".$this->model->event->getContentByEventCode($con3)." AND ".$this->model->event->getContentByEventCode($con1);
						header("Location: http://localhost/cstt/index.php?c=manage&a=editRule&idcondition=".$idcondition."&content=".$content);
					}
				}
				if ($type2 == 4 && $type3 == 1) {
					$this->model->load('condition');
					$check = $this->model->condition->getIdCondition($con3, 0, $con1, $con2);
					if($check != 0){
						header("Location: http://localhost/cstt/index.php?c=manage&a=manage&mess=Luật%20đã%20tồn%20tại!!!");
					}
					else{
						$idcondition = $this->model->condition->addCondition($con3, 0, $con1, $con2, $_SESSION['name']);
						$this->model->load('event');
						$content = $this->model->event->getContentByEventCode($con3)." AND ".$this->model->event->getContentByEventCode($con2)." AND ".$this->model->event->getContentByEventCode($con1);
						header("Location: http://localhost/cstt/index.php?c=manage&a=editRule&idcondition=".$idcondition."&content=".$content);
					}
				}
			}
			if(($type2 == 2 && $type3 == 4) || ($type2 == 4 && $type3 == 2)){
				if ($type2 == 2 && $type3 == 4)  {
					$this->model->load('condition');
					$check = $this->model->condition->getIdCondition(0, $con2, $con1, $con3);
					if($check != 0){
						header("Location: http://localhost/cstt/index.php?c=manage&a=manage&mess=Luật%20đã%20tồn%20tại!!!");
					}
					else{
						$idcondition = $this->model->condition->addCondition(0, $con2, $con1, $con3, $_SESSION['name']);
						$this->model->load('event');
						$content = $this->model->event->getContentByEventCode($con2)." AND ".$this->model->event->getContentByEventCode($con3)." AND ".$this->model->event->getContentByEventCode($con1);
						header("Location: http://localhost/cstt/index.php?c=manage&a=editRule&idcondition=".$idcondition."&content=".$content);
					}
				}
				if ($type2 == 4 && $type3 == 2) {
					$this->model->load('condition');
					$check = $this->model->condition->getIdCondition(0, $con3, $con1, $con2);
					if($check != 0){
						header("Location: http://localhost/cstt/index.php?c=manage&a=manage&mess=Luật%20đã%20tồn%20tại!!!");
					}
					else{
						$idcondition = $this->model->condition->addCondition(0, $con3, $con1, $con2, $_SESSION['name']);
						$this->model->load('event');
						$content = $this->model->event->getContentByEventCode($con3)." AND ".$this->model->event->getContentByEventCode($con2)." AND ".$this->model->event->getContentByEventCode($con1);
						header("Location: http://localhost/cstt/index.php?c=manage&a=editRule&idcondition=".$idcondition."&content=".$content);
					}
				}
			}
		}
		if ($type1 == 4){
			if(($type2 == 1 && $type3 == 2) || ($type2 == 2 && $type3 == 1)){
				if ($type2 == 1 && $type3 == 2)  {
					$this->model->load('condition');
					$check = $this->model->condition->getIdCondition($con2, $con3, 0, $con1);
					if($check != 0){
						header("Location: http://localhost/cstt/index.php?c=manage&a=manage&mess=Luật%20đã%20tồn%20tại!!!");
					}
					else{
						$idcondition = $this->model->condition->addCondition($con2, $con3, 0, $con1, $_SESSION['name']);
						$this->model->load('event');
						$content = $this->model->event->getContentByEventCode($con2)." AND ".$this->model->event->getContentByEventCode($con3)." AND ".$this->model->event->getContentByEventCode($con1);
						header("Location: http://localhost/cstt/index.php?c=manage&a=editRule&idcondition=".$idcondition."&content=".$content);
					}
				}
				if ($type2 == 2 && $type3 == 1) {
					$this->model->load('condition');
					$check = $this->model->condition->getIdCondition($con3, $con2, 0, $con1);
					if($check != 0){
						header("Location: http://localhost/cstt/index.php?c=manage&a=manage&mess=Luật%20đã%20tồn%20tại!!!");
					}
					else{
						$idcondition = $this->model->condition->addCondition($con3, $con2, 0, $con1, $_SESSION['name']);
						$this->model->load('event');
						$content = $this->model->event->getContentByEventCode($con3)." AND ".$this->model->event->getContentByEventCode($con2)." AND ".$this->model->event->getContentByEventCode($con1);
						header("Location: http://localhost/cstt/index.php?c=manage&a=editRule&idcondition=".$idcondition."&content=".$content);
					}
				}
			}
			if(($type2 == 1 && $type3 == 3) || ($type2 == 3 && $type3 == 1)){
				if ($type2 == 1 && $type3 == 3)  {
					$this->model->load('condition');
					$check = $this->model->condition->getIdCondition($con2, 0, $con3, $con1);
					if($check != 0){
						header("Location: http://localhost/cstt/index.php?c=manage&a=manage&mess=Luật%20đã%20tồn%20tại!!!");
					}
					else{
						$idcondition = $this->model->condition->addCondition($con2, 0, $con3, $con1, $_SESSION['name']);
						$this->model->load('event');
						$content = $this->model->event->getContentByEventCode($con2)." AND ".$this->model->event->getContentByEventCode($con3)." AND ".$this->model->event->getContentByEventCode($con1);
						header("Location: http://localhost/cstt/index.php?c=manage&a=editRule&idcondition=".$idcondition."&content=".$content);
					}
				}
				if ($type2 == 3 && $type3 == 1) {
					$this->model->load('condition');
					$check = $this->model->condition->getIdCondition($con3, 0, $con2, $con1);
					if($check != 0){
						header("Location: http://localhost/cstt/index.php?c=manage&a=manage&mess=Luật%20đã%20tồn%20tại!!!");
					}
					else{
						$idcondition = $this->model->condition->addCondition($con3, 0, $con2, $con1, $_SESSION['name']);
						$this->model->load('event');
						$content = $this->model->event->getContentByEventCode($con3)." AND ".$this->model->event->getContentByEventCode($con2)." AND ".$this->model->event->getContentByEventCode($con1);
						header("Location: http://localhost/cstt/index.php?c=manage&a=editRule&idcondition=".$idcondition."&content=".$content);
					}
				}
			}
			if(($type2 == 2 && $type3 == 3) || ($type2 == 3 && $type3 == 2)){
				if ($type2 == 2 && $type3 == 3)  {
					$this->model->load('condition');
					$check = $this->model->condition->getIdCondition(0, $con2, $con3, $con1);
					if($check != 0){
						header("Location: http://localhost/cstt/index.php?c=manage&a=manage&mess=Luật%20đã%20tồn%20tại!!!");
					}
					else{
						$idcondition = $this->model->condition->addCondition(0, $con2, $con3, $con1, $_SESSION['name']);
						$this->model->load('event');
						$content = $this->model->event->getContentByEventCode($con2)." AND ".$this->model->event->getContentByEventCode($con3)." AND ".$this->model->event->getContentByEventCode($con1);
						header("Location: http://localhost/cstt/index.php?c=manage&a=editRule&idcondition=".$idcondition."&content=".$content);
					}
				}
				if ($type2 == 3 && $type3 == 2) {
					$this->model->load('condition');
					$check = $this->model->condition->getIdCondition(0, $con3, $con2, $con1);
					if($check != 0){
						header("Location: http://localhost/cstt/index.php?c=manage&a=manage&mess=Luật%20đã%20tồn%20tại!!!");
					}
					else{
						$idcondition = $this->model->condition->addCondition(0, $con3, $con2, $con1, $_SESSION['name']);
						$this->model->load('event');
						$content = $this->model->event->getContentByEventCode($con3)." AND ".$this->model->event->getContentByEventCode($con2)." AND ".$this->model->event->getContentByEventCode($con1);
						header("Location: http://localhost/cstt/index.php?c=manage&a=editRule&idcondition=".$idcondition."&content=".$content);
					}
				}
			}
		}
	}

	public function add4DkAction(){
		$con1 = 0;
		$con2 = 0;
		$con3 = 0;
		$con4 = 0;
		if (isset($_POST['add4R'])) {
			if(isset($_POST['con1']) && isset($_POST['con2']) && isset($_POST['con3']) && isset($_POST['con4'])){
				$con1 = $_POST['con1'];
				$con2 = $_POST['con2'];
				$con3 = $_POST['con3'];
				$con4 = $_POST['con4'];
			}
		}
		$this->model->load('condition');
		$check = $this->model->condition->getIdCondition($con1, $con2, $con3, $con4);
		if($check != 0){
			header("Location: http://localhost/cstt/index.php?c=manage&a=manage&mess=Luật%20đã%20tồn%20tại!!!");
		}
		else{
			$idcondition = $this->model->condition->addCondition($con1, $con2, $con3, $con4, $_SESSION['name']);
			$this->model->load('event');
			$content = $this->model->event->getContentByEventCode($con1)." AND ".$this->model->event->getContentByEventCode($con2)." AND ".$this->model->event->getContentByEventCode($con3)." AND ".$this->model->event->getContentByEventCode($con4);
			header("Location: http://localhost/cstt/index.php?c=manage&a=editRule&idcondition=".$idcondition."&content=".$content);
		}
	}
}

?>