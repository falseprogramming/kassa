<?php

class Stats extends Controller {
		
		public $date;
		function __construct() {
			
			parent::__construct();
			$this->admin_check();
			$this->date = date("Y-m-d");
		}
		
		public function index() {
			
			$this->render('stats/index');
			$this->view->title = 'Statistika';
		}
		
		public function sale() {
			
			$this->render('stats/sale');
			$this->view->title = 'Müügi päringud';
		}
		
		
		
		public function product() {
			$m = $this->loadModel('stats');
			$this->view->pStatsVi = $m->productStats();
			$this->view->title = 'Toote päringud';
			$this->render('stats/product');
		}
		
		public function stats_sum() {
			
			$data = array();
			
			$data['cash_payment'] = $_POST['cash_payment'];
			$data['card_payment'] = $_POST['card_payment'];
			$data['total_sum'] = $_POST['total_sum'];
			$data['sum_date'] = $this->date;
			
			$m = $this->loadModel('stats');
			$m->statsSum($data);
		}

		public function insert() {
			$this->stats_sum();
			
			$d = $this->loadModel('sales');
			$d->deleteSale();
			$data = array();
			foreach($_POST['type'] as $k => $v) {
			$data['type'] = $_POST['type'][$k];
			$data['time'] = $_POST['time'][$k];
			$data['date'] = $this->date;
			$data['price'] =  $_POST['price'][$k];
			$data['method'] = $_POST['method'][$k];
			$m = $this->loadModel('stats');
			$m->insert($data);
			}
			header('location:'.URL.'index/finished_date');
			
			
			
		}
		
		public function getStats() {
			$m = $this->loadModel('stats');
			$var  = $m->getStats();
			$this->view->dateResult = $var['date'];
			$this->view->dateSumResult = $var['sum_date'];
			
			$this->view->eandsDateResult = $var['eandsDate'];
			$this->view->eandsDateSumResult = $var['sum_eandsDate'];
			
			$this->view->todayResult = $var['today'];
			$this->view->todaySumResult = $var['sum_today'];
			
			$this->view->yesterdayResult = $var['yesterday'];
			$this->view->yesterdaySumResult = $var['sum_yesterday'];
			
			$this->view->thisWeekResult = $var['thisWeek'];
			$this->view->thisWeekSumResult = $var['sum_thisWeek'];
			
			$this->view->pastWeekResult = $var['pastWeek'];
			$this->view->pastWeekSumResult = $var['sum_pastWeek'];
			
			$this->view->thisMonthResult = $var['thisMonth'];
			$this->view->thisMonthSumResult = $var['sum_thisMonth'];
			
			$this->view->pastMonthResult = $var['pastMonth'];
			$this->view->pastMonthSumResult = $var['sum_pastMonth'];

			$this->render('stats/saleResult');
			
			
		}
		
		
		public function getProductStats() {
			$m = $this->loadModel('stats');
				$var = $m->getProductStats();
				$this->view->pStatsVi = $m->productStats();
				
				$this->view->productDateResult = $var['productDate'];
				$this->view->productSandEdateResult = $var['productSandEdate'];
				$this->view->productTodayResult = $var['productToday'];
				$this->view->productYesterdayResult = $var['productYesterday'];
				$this->view->productThisWeekResult = $var['productThisWeek'];
				$this->view->productPastWeekResult = $var['productPastWeek'];
				$this->view->productThisMonthResult = $var['productThisMonth'];
				$this->view->productPastMonthResult = $var['productPastMonth'];
				$this->view->productAll = $var['productAll'];
				$this->render('stats/productResult');
			
		}
}