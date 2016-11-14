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

    <style>
        #display{
            border-left: 2px solid green;
            border-spacing: 10px 10px;

        }
        p {
            padding-left: 10px;
        }
        h5{
            margin-top: 30px;
        }
        button{
            margin-left: 10px;
        }
    </style>
</head>

<body style="background-color: #E3E3E3">

<header class="header-basic">

    <div class="header-limiter">

        <h1><a href="#">Lot<span>us</span></a></h1>

        <nav>
            <?php
            session_start();
            if(isset($_SESSION['login_user'])){
                echo"
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

<div class="container" style="margin-top:40px;">
    <h2>Drop Reservation <small>Select the reservation in which you would like to cancel.</small></h2>

    <?php //display all reservations from the username
    $reservation = array(["id" => "1", "room" => "H908", "start_time" => "7", "end_time" => "9",
        "description" => "COMP 348. The room is used to work on the aspectJ
                             and lisp project.", "date" => "2016-11-9"],
        ["id" => "2", "room" => "H908", "start_time" => "7", "end_time" => "9",
            "description" => "COMP 348. The room is used to work on the aspectJ
                             and lisp project.", "date" => "2016-11-9"]);
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

</body>
</html>