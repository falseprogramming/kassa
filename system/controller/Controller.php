<?php

class Controller extends jream\mvc\Controller {
	
	public function __construct(){
		parent::__construct();
	
	}
	
	public function render($name,$arr = array()){
		$this->view->render('include/header');
		$this->view->render($name,$arr);
		$this->view->render('include/footer');
	}
	

	
	public function admin_check() {
		
		Session::start();
		$l = Session::fetch('loggedIn');
			if($l == false) {
				
				Session::destroy();
				header('location:'.URL.'login');
				exit();
				
			}
	}
	
	public function utype_check() {
		if(Session::fetch('type') == user) {
			header('location:'.URL.'permission');
			die();
			
		}
	}

	
	

	

}