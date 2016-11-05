<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Room Reservation System</title>

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="/assets/css/main.css">
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!--FontAwesome-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <!-- Customized header CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/header.css">

</head>

<body style="background-color: #E3E3E3">

    <header class="header-basic">

        <div class="header-limiter">

            <h1><a href="#">Lot<span>us</span></a></h1>

            <nav>
                <a href="#">Support</a>
                <a href="#">About</a>
            </nav>
        </div>
    </header>

    <div id="banner">Booking System</div>

    <div class="container" style="margin-top:40px;">
        <h4>Provide your username and password</h4>

        <form role="form" action="index.php" method="post" class="form-horizontal">

            <div class="form-group">
                <div class="col-lg-1">
                     <label for="input_username">Username</label>
                </div>
                <div class="col-lg-3">
                    <input type="text" class="form-control" name="username" id="input_username">
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-1">
                    <label for="input_password">Password</label>
                </div>
                <div class="col-lg-3">
                    <input type="password" class="form-control" name="password" id="input_password">
                </div>
            </div>

            <div class="col-lg-offset-3 col-lg-3">
                <button class="btn btn-default btn-md">Login</button>
            </div>
        </form>
    </div>
</body>

<?php
/**
 * First create the necessary php functions to validate the login form in the created php file (form_login_validation) don't forget to include file!
 * Example : if inputs are empty. if username and password entered do not exist. if username and password do not match.
 * Once it is successful, redirect to calendar page. Else echo errors
 * Get the values input using $_POST
 */
?>

<footer>
    <p>All rights reserved</p>
</footer>


<!--JQuery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!--Bootstrap js-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>