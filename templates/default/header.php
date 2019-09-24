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
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?php echo $title ?></title>
        <link rel="stylesheet" href="/lib/bootstrap4.3.1/css/bootstrap.min.css">
        <script src="/lib/jquery3.4.1/jquery.min.js"></script>
        <script src="/lib/bootstrap4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="/assets/css/dashboard.css">
    <head>
    <body>

    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="/app/dashboard.php">Libellum</a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="app/logout.php">Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link <?php echo ($page == 'dashboard' ? 'active' : '')?>" href="/app/dashboard.php">
                  <span data-feather="home"></span>
                  Dashboard</span>
                </a>
              </li>
            </ul>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

