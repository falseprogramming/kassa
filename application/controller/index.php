<?php

class Index extends Controller {

	public function __construct() {
		parent::__construct();
		$this->admin_check();	
	}
	public function index() {
		//echo jream\Hash::create('sha256', 'admin', HASH_PASSWORD_KEY);
		$m = $this -> loadModel('product');
		$s = $this->loadModel('sales');
		$this->view->sale = $s->getSale();
		$this -> view -> productListVI = $m -> productListMOD();
		$this->view->title ='Avaleht';
		$this -> render('index/index');

	}

	public function add() {
		
		$date = date("Y-m-d");
		$time = date('H:i:s', time());
		$data = array();
		$data['type'] = $_POST['type'];
		$data['price'] = $_POST['price'];
		$data['method'] = $_POST['method'];
		$data['date'] = $date;
		$data['time'] = $time;
		$m = $this -> loadModel('sales');
		if($_POST['price'] == '') {
			$this->view->Smsg = 'Toote hind puudu! Sisestada 0 , kui on ilma hinnata toode.';
			$this->render('error/index');
			return false;
		}
		$m -> insertSale($data);
		header('location:' . URL);
	}
	

	
	public function finished_date() {
		
		$this->render('index/finished_date');
	}

	public function logout() {
		Session::start();
		Session::destroy();
		header('location:' . URL . 'login');
	}

}
