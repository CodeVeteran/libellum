<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/config/db.class.php');

class Session {
 
	private $db;

	function __construct() {
		$this->db = new Database();
	}

	function isLoggedIn(){
		return isset($_SESSION['USER']) && $_SESSION['USER']['ID'] != NULL;
	}

	function isExpired(){
		return time() - $_SESSION['USER']['LOGGED_TIME'] > 3600;
	}
}

?>