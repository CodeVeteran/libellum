<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/session.class.php');

$session = new Session();
if(!$session->isLoggedIn()){
    header('Location: /');
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title ?></title>
    <head>
    <body>