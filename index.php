<?php
    if(isset($_SESSION['login_user'])){
        header('Location: '.'booking.php');
    }

?>

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

    <div class="container" style="margin-top:40px;">
        <h4>Provide your username and password</h4>
        <p id="errorDisplay"></p>
        <?php

            if(isset($_GET['authentification']) and $_GET['authentification'] == 'missing'){
                echo"Empty fields";
            }
            else{
                if(isset($_GET['authentification']) and $_GET['authentification']=='false'){
                    echo"Wrong username/password";
                }
            }
        ?>

        <form action="loginValidation.php" method="GET" name="login_form" class="form-horizontal" onsubmit="return validateForm()">

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
                <input type="submit" class="btn btn-default btn-md" value="Login">
            </div>
        </form>
    </div>
</body>

<footer>
    <p>All rights reserved</p>
</footer>


<!--JQuery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!--Bootstrap js-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--Custom js-->
<script src="assets/js/index_form_validation.js";

</body>
</html>