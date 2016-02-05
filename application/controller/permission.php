<?php

class Permission extends Controller {
	
	function __construct() {
		
		parent::__construct();
		$this->admin_check();
	}
	
	public function index() {
		
		$this->render('permission/index');
	}
}