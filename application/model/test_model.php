<?php

class Test_model extends Model {
	
	function __construct() {
		
		parent::__construct();
	}
	
	public function add($data) {
		
		$this->db->insert('rand',array(
			'field1' => $data['field1'],
			'field2' => $data['field2']
		));
		
	}
	
	public function edit($id) {
		
		return $this->db->select("select * from field where id = $id");
	}
	
	public function editDo($data) {
		
		$post = array(
		'field1' => $data['field1'],
		'field2' => $data['field2']
		);
		
		$this->db->update('tbl',$post,"`$id` = {$data['id']}");
	}
	
	public function delete($id) {
		
		return $this->db->delete("delete * from tbl where id = $id");
		
	}
}