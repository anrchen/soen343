<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

        <h1><a href="index.php">Lot<span>us</span></a></h1>

        <nav>
            <?php
            if(isset($_SESSION['login_user'])){
                echo "<a style='color: white'>Logged in as ".$_SESSION['login_user']."</a> 
                                    <a href=\"logout.php\">Log out</a>
                                ";
            }else{
                echo"
                                    <a href=\"login.php\">Log in</a>
                                ";
            }
            ?>
            <a href="#">About</a>
            <a href="#">Support</a>
        </nav>
    </div>
</header>
    <div class="container" style="text-align: center; margin-top: 50px;">

        <img src="assets/img/warning.png" width="50" height="50">
        <p style="color: red">Time conflict! The time slot you selected is already reserved by another user.</p>

        <p><a href="action_waitList.php">Add reservation to waitlist</a></p>
        <p><a href="action_removeRecentReservation.php">Return to main menu</a></p>
    </div>

</body>


<footer style="margin-top: 270px;">
    <p>All rights reserved</p>
</footer>

<script src="assets/js/makeReservation_validation.js"></script>

<!--Bootstrap js-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>