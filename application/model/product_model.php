<?php

class Product_model extends Model {
	
	function __construct() {
		
		parent::__construct();
	}
	
	public function productListMOD() {
		
		return $this->db->select('select * from product');
	}
	
	public function addProductMOD($data) {
		
		$this->db->insert('product',array(
			'name' => $data['name']
		));
	}
	
	public function delete($id) {
		
		return $this->db->delete('product',"id = $id");
	}
}