<?php

class Login extends Controller {
	
	public function __construct() {
		
		parent::__construct();

	}
	
	public function index() {
		$this->view->render('login/index');
	}
	
	public function go() {
		
		$m = $this->loadModel('login');
		$m->go();
	}
	
	
}