<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/user.class.php');

if(isset($_POST['signIn'])){
    $user = new User();
    if($user->login($_POST['email'], $_POST['password'])){
        header('Location: /app/dashboard.php');
    }
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Login - Libellum</title>
        <link rel="stylesheet" href="/lib/bootstrap4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="/assets/css/login.css">
        <script src="/lib/jquery3.4.1/jquery.min.js"></script>
        <script src="/lib/bootstrap4.3.1/js/bootstrap.min.js"></script>
    <head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card card-signin my-5">
                        <div class="card-body">
                            <h5 class="card-title text-center">Sign In</h5>
                            <form class="form-signin" method="POST">
                                <div class="form-label-group">
                                    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus name="email">
                                    <label for="inputEmail">Email address</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">
                                    <label for="inputPassword">Password</label>
                                </div>

                                <button class="btn btn-lg btn-primary btn-block text-uppercase" name="signIn" type="submit">Sign in</button>
                            
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html