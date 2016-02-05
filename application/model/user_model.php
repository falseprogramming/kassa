<?php

class User_model extends Model {
	
	function __construct() {
		
		parent::__construct();
		
	}
	
	public function showUsers() {
		
		return $this->db->select('select * from user');
	}
	
	public function addUser($data) {
		
		$this->db->insert('user',array(
			
			'username' => $data['username'],
			'password' => (jream\Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY)),
			'type' => $data['type']
		
		));
	}
	
	public function edit($id) {
		
		return $this->db->select("select * from user where id = $id");
	}
	
	public function editDo($data) {
		
			$password  = $data['password'];
	
		if($password == '') {		
		$post = array(
			'username' => $data['username'],
			'type' => $data['type']
		);
		$this->db->update('user', $post, "`id` = {$data['id']}");
		} else {
			$post = array(
			'username' => $data['username'],
			'password' => jream\Hash::create('sha256', $password, HASH_PASSWORD_KEY),
			'type' => $data['type']
		);
		$this->db->update('user', $post, "`id` = {$data['id']}");	
		}
		
	}
	
	public function delete($id) {
		
		return $this->db->delete("user","`id` ='$id'");
	}
}