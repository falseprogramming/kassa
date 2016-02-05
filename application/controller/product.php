<?php
class Product extends Controller {
	
		function __construct() {
			parent::__construct();
			$this->admin_check();
			$this->utype_check();
		}
		
		public function index() {
			$m = $this->loadModel('product');
			$this->view->listProductsVI = $m->productListMOD();
			$this->view->title = 'Tooted';
			$this->render('product/index');
		}
		public function listProducts() {

		}
		
		public function addProduct() {
			
			$data = array();
			$data['name'] = $_POST['name'];
			
			$m = $this->loadModel('product');
			if($_POST['name'] == '') {
				$this->view->Pmsg = 'Toote nimi puudu';
				$this->render('error/index');
				return false;
			}
				$m->addProductMOD($data);
			header('location:'.URL.'product');
			
		}
		
		public function delete($id) {
			$m = $this->loadModel('product');
				$m->delete($id);
			header('location:'.URL.'product');
		}
	
}