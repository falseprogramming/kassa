<?php

class Login_model extends Model {
	
	public function __construct() {
		
		parent::__construct();
	}
	
	public function go() {
		
		$sth = $this->db->prepare("select id, username, password,type from user 
		where username = :username and password = :password");
		
			$sth->execute(array(
				':username' => $_POST['username'],
				':password' =>  jream\Hash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY)
			));
			
			$d = $sth->fetch();
				$count = $sth->rowCount();
				
					if($count > 0) {
						Session::start();
						Session::set('id',$d['id']);
						Session::set('username',$d['username']);
						Session::set('type',$d['type']);
						Session::set('loggedIn',true);
						header('location:'.URL);
						
					} else {
						
						header('location:'.URL.'login');
					}
		
	}
}