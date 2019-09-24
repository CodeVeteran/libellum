<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/session.class.php');

$session = new Session();
if($session->isLoggedIn()){
    if($session->isExpired()){
        session_destroy();
        header('Location: /');
    }

    $_SESSION['USER']['LOGGED_TIME'] = time();
}else{
    header('Location: /');
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title ?></title>
    <head>
    <body>