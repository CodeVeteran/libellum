<?php
session_start();

require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/session.class.php');

$session = new Session();
if($session->isLoggedIn()){
    session_destroy();
    header('Location: /');
}else{
    header('Location: /');
}

?>