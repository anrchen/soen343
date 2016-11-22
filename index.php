<?php
    require_once ("objects/functions/function_login_validation.php");


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "conference";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT username, password FROM login";
    $result = $conn->query($sql);

    $errors = array();
    $message = "";

    if(isset($_POST['submit'])){
        //Process the form
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        $fields_required = array("username", "password");

        foreach($fields_required as $field){
            $value = trim($_POST[$field]);
            if(!has_presence($value)){
                $errors[$field] = ucfirst($field) . " cannot be blank";
            }
        }

        if(empty($errors)){
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    if ($username == $row["username"] and $password == $row["password"]) {
                        session_start();
                        $_SESSION['login_user'] = $_POST['username'];
                        header('Location: ' . 'booking.php');
                    }
                    else {
                        $message = "<ul>";
                        $message .= "<li style='color:red;'>Username and Password do not match</li>";
                        $message .= "</ul>";
                    }
                }
            }
        }
    } else {
        $message = "Please Log in";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Room Reservation System</title>

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
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
        <h2 id="welcomeTitle">Booking System</h2>

        <?php
            require_once ("objects/functions/function_login_validation.php");
            echo '<p id="message">'.$message.'</p>';
            echo form_errors($errors);
        ?>

        <form action="index.php" method="post" name="login_form" class="form-horizontal">

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
                <input type="submit" name="submit" class="btn btn-default btn-md" value="Submit">
            </div>
        </form>

        <?php

        ?>
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
<!--<script src="assets/js/index_form_validation.js";-->

</body>
</html>