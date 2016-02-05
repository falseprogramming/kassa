<?php

class Sale extends Controller {
	
	function __construct() {
		
		parent::__construct();
	}
	
	public function index() {
		
		$this->render('sale/index');
		
	}
	
	public function insertSale() {
		
		$m = $this->loadModel('sales');
			$m->insertSale();
	}
	
	public function newSale($id) {
		
		$this->render('sale/index');
			
	}
	
	public function deleteSaleItem($id) {
		
		$m = $this->loadModel('sales');
			$m->deleteSaleItem($id);
			header('location:'.URL);
	}
}