<?php

class Settings extends Controller {
	
	function __construct() {
		
		parent::__construct();
		$this->admin_check();
		$this->utype_check();	
	}
	public function index() {
		
		$this->render('settings/index');
		$this->view->title = 'Seaded';
	}
}