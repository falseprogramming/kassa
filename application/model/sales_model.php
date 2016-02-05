<?php

class Sales_model extends Model {
	
	function __construct() {
		
		parent::__construct();
	}
	
	public function insertSale($data) {
		
		$this->db->insert('sale',array(
			'type' => $data['type'],
			'time' => $data['time'],
			'date' => $data['date'],
			'price' => $data['price'],
			'method' => $data['method']
		
		));
		
	}
	
	public function getSale() {
		
		return $this->db->select('select * from sale order by time asc');
	}
	
		public function getSaleStatus() {
		
		return $this->db->select('select * from sale');
	}
		public function checkSale() {
		
		return $this->db->select('select * from sale');
	}
	public function deleteSale() {
		
		return $this->db->deleteAll("sale");
	}
	
	public function deleteSaleItem($id) {
		
		return $this->db->delete("sale","`id` ='$id'");
	}
}