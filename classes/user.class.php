<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/config/db.class.php');

class User {
 
	private $db;
	public $firstname;
	public $lastname;

	function __construct() {
		$this->db = new Database();
	}

	public function login($email, $password){
		$this->db->query('SELECT id, firstname, lastname FROM users WHERE email = :email AND password = :password');
		$this->db->bind('email', $email);  
		$this->db->bind('password', md5($password));  

		$row = $this->db->single();  
		if($row != null){
			$_SESSION['USER']['ID'] = $row['id'];
			$_SESSION['USER']['FIRSTNAME'] = $row['firstname'];
			$_SESSION['USER']['LASTNAME'] = $row['lastname'];
			$_SESSION['USER']['LOGGED_TIME'] = time();
			return true;
		}else{
			return false;
		}
	}

	public function getAllUsers(){
		$this->db->query('SELECT id, firstname, lastname, email FROM users');
		return $this->db->resultset();
	}
}

?>