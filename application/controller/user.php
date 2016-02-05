<?php

class User extends Controller {
	
	function __construct() {
		
		parent::__construct();
		$this->admin_check();
		$this->utype_check();
	}
	
	public function index() {
		
		$m = $this->loadModel('user');
		$this->view->users = $m->showUsers();
		$this->view->title = 'Kasutajad';	
		$this->render('user/index');
	}
	
	public function addUser() {
		
		$data = array();
		$data['username'] = $_POST['username'];
		$data['password'] = $_POST['password'];
		$data['type'] = $_POST['type'];
		
		$m = $this->loadModel('user');
		
			if(($_POST['username'] == '') or ($_POST['password'] == '') ) {
				$this->view->Umsg = 'Kasutajanimi/parool puudu.';
				$this->render('error/index');
				return false;
			}
		
			$m->addUser($data);
			header('location:'.URL.'user');
	}
	
	public function edit($id) {
		$m = $this->loadModel('user');
		$this->view->editUser = $m->edit($id);
			$this->render('user/edit');
	}
	
	public function editDo($id) {
		
		$data = array();
		$data['id'] = $id;
		$data['username'] = $_POST['username'];	
		$data['type'] = $_POST['type'];
		$data['password'] = $_POST['password'];	
		$m = $this->loadModel('user');
		
		if($_POST['username'] == '') {
			$this->view->eUmsg = 'Kasutaja nimi puudu!.';
			$this->render('error/index');
			return false;
		}
			$m->editDo($data);
		
			header('location:'.URL.'user');
	}
	
	public function delete($id) {
		
		$m = $this->loadModel('user');
			$m->delete($id);
			header('location:'.URL.'user');
	}
}