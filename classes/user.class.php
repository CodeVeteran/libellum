<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/config/db.class.php');

class User {
 
	private $db;
	public $id;
	public $firstname;
	public $lastname;
	public $email;
	private $password;

	function __construct($id = null, $firstname = null, $lastname = null, $email = null, $password = null) {
		$this->db = new Database();
		$this->id = $id;
		$this->firstname = $firstname;
		$this->lastname = $lastname;
		$this->email = $email;
		$this->password = $password;
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

	public function getUser($id){
		$this->db->query('SELECT id, firstname, lastname, email FROM users WHERE id = :id');
		$this->db->bind('id', $id);
		
		$row = $this->db->single();

		return new User($row['id'], $row['firstname'], $row['lastname'], $row['email']);
	}

	public function save(){
		$sql = "INSERT INTO ";
		$password = ", password = :password";
		$where = "";

		if($this->id != 0){
			$sql = "UPDATE ";
			$where = " WHERE id = :id";
			
			if(strlen($this->password) < 8){
				$password = "";
			}
		}

		$this->db->query($sql . "users SET firstname = :firstname, lastname = :lastname, email = :email" . $password . $where);
		$this->db->bind('firstname', $this->firstname);
		$this->db->bind('lastname', $this->lastname);
		$this->db->bind('email', $this->email);

		if($this->id != 0){
			$this->db->bind('id', $this->id);
		}

		if(strlen($this->password) >= 8){
			$this->db->bind('password', md5($this->password));
		}

		$this->db->execute();
	}


}

?>