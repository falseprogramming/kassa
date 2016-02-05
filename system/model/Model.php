<?php

class Model extends jream\mvc\Model {
	
	public function __construct(){
		
		parent::__construct();
		$this->db = \jream\Registry::fetch('db');
	}
}