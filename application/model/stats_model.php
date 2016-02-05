<?php

class Stats_model extends Model {
	
		function __construct() {
			
			parent::__construct();
		}
	
	
	public function insert($data) {
		
		$this->db->insert('stats', array(
			'type' => $data['type'],
			'price' => $data['price'],
			'time' => $data['time'],
			'date' => $data['date'],
			'method' => $data['method']
			
		));
		
	}
	
	public function productStats() {
		
		return $this->db->select("select name from product");
	}
	public function getStats() {
		$date = $_GET['date'];
		$today = $_GET['today'];
		$sDate = $_GET['startDate'];
		$eDate = $_GET['endDate'];
		if($eDate == '') {
			
			$eDate = date('Y-m-d');
		}
		$yesterday = $_GET['yesterday'];
		$thisWeek = $_GET['thisWeek'];
		$thisWeek2 = $_GET['thisWeek2'];
		
		$pastWeek = $_GET['pastWeek'];
		$pastWeek2 = $_GET['pastWeek2'];
		$pastMonth = $_GET['pastMonth'];
		$thisMonth = $_GET['thisMonth'];
		$arr = array();
			
		if($date) {
		$arr['sum_date'] = $this->db->select("select  * from stats_sum where sum_date = '$date'");	
		$arr['date'] = $this->db->select("select * from stats where date like '%$date%'");
		} 
		
		if($sDate && $eDate) {
			$arr['sum_eandsDate'] = $this->db->select("select  * from stats_sum where sum_date >= '$sDate' and sum_date <= '$eDate' order by sum_date desc");
			$arr['eandsDate'] = $this->db->select("select  * from stats where date >= '$sDate' and date <= '$eDate' order by date desc , time desc");
		}
		
		if($today) {
			$arr['sum_today'] = $this->db->select("select  * from stats_sum where sum_date = '$today'");
			$arr['today'] = $this->db->select("select * from stats where date = '$today' order by time desc");
	}
		if($yesterday) {
			$arr['sum_yesterday'] = $this->db->select("select  * from stats_sum where sum_date = '$yesterday'");
			$arr['yesterday'] = $this->db->select("select * from stats where date  = '$yesterday' order by time desc");
		}
		if($thisWeek) {
			$arr['sum_thisWeek'] = $this->db->select("select  * from stats_sum where sum_date >= '$thisWeek' and sum_date <= '$thisWeek2' order by sum_date desc");
			$arr['thisWeek'] = $this->db->select("select  * from stats where date >= '$thisWeek' and date <= '$thisWeek2' order by date desc , time desc");
		}
		if($pastWeek) {
			$arr['sum_pastWeek'] = $this->db->select("select  * from stats_sum where sum_date >= '$pastWeek' and sum_date <= '$pastWeek2' order by sum_date desc");
			$arr['pastWeek'] = $this->db->select("select  * from stats where date >= '$pastWeek' and date <= '$pastWeek2' order by date desc , time desc");
		}
		if($thisMonth) {
			$arr['sum_thisMonth'] = $this->db->select("select  * from stats_sum where sum_date like '%$thisMonth%' order by sum_date desc");
			$arr['thisMonth'] = $this->db->select("select * from stats where date  like '%$thisMonth%' order by date desc , time desc");
			
		}
		if($pastMonth) {
			$arr['sum_pastMonth'] = $this->db->select("select  * from stats_sum where sum_date like '%$pastMonth%' order by sum_date desc");
			$arr['pastMonth'] = $this->db->select("select * from stats where date  like '%$pastMonth%' order by date desc , time desc");
		} 
		return $arr;
	}

	public function getProductStats() {
		$arr = array();
		
		$pStats = $_GET['pStats'];
		
		$str = implode("', '",$pStats);
		
		$date = $_GET['date'];
		$sDate = $_GET['startDate'];
		$eDate = $_GET['endDate'];
		if($eDate == '') {
			
			$eDate = date('Y-m-d');
		}
		$today = $_GET['today'];
		$yesterday = $_GET['yesterday'];
		$thisWeek = $_GET['thisWeek'];
		$thisWeek2 = $_GET['thisWeek2'];
		$pastWeek = $_GET['pastWeek'];
		$pastWeek2 = $_GET['pastWeek2'];
		$thisMonth = $_GET['thisMonth'];
		$pastMonth = $_GET['pastMonth'];
		
		if($date) {
				
			$arr['productDate'] = $this->db->select("select type, date from stats where type in ('$str') and date = '$date'");
		}
		if($sDate && $eDate) {	
		$arr['productSandEdate'] = $this->db->select("select type, date from stats where type in ('$str') and date >= '$sDate' and date <= '$eDate'");
			
		}
		if($today) {
		$arr['productToday'] = $this->db->select("select type,date from stats where  type in ('$str') and date = '$today' ");	
		}
		if($yesterday) {
			
		$arr['productYesterday'] = $this->db->select("select type,date from stats where  type in ('$str') and date = '$yesterday'");	
		}
		if($thisWeek) {
			
		$arr['productThisWeek'] = $this->db->select("select type,date from stats where  type in ('$str') and date >= '$thisWeek' and date <= '$thisWeek2'");	
				
		}
		
		if($pastWeek) {
			
		$arr['productPastWeek'] = $this->db->select("select type,date from stats where  type in ('$str') and date >= '$pastWeek' and date <= '$pastWeek2'");			
		}
		if($thisMonth) {
			$arr['productThisMonth'] = $this->db->select("select type,date from stats where  type in ('$str') and date like '%$thisMonth%'");
		}
		if($pastMonth) {
			$arr['productPastMonth'] = $this->db->select("select type,date from stats where  type in ('$str') and date like '%$pastMonth%'");
		} else {
			$arr['productAll'] = $this->db->select("select * from stats where type in('$str')");
		}
		return $arr;
	}
	
	public function statsSum($data) {
		
		$this->db->insert('stats_sum',array(
			'cash_payment' => $data['cash_payment'],
			'card_payment' => $data['card_payment'],
			'total_sum' => $data['total_sum'],
			'sum_date' => $data['sum_date']
		));
		
	}
	
}