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
    <h2>Drop Reservation <small>Select the reservation you would like to cancel.</small></h2>

    <?php
         //returns all the reservations by the current user
         include_once ('action_viewUserReservation.php');
    ?>

    <?php
    foreach($reservation as $reserve){

        $id = $reserve['id'];
        $descp = $reserve['description'];
        $date = $reserve['date'];
        $room = $reserve['room'];
        $time = $reserve['start_time'] . ' - ' . $reserve['end_time'];

        echo '<h5><strong><i>Reservation ID #' . $id . '</i></strong></h5>';

        echo '<div id="display">';

        echo '<p>Date: '. $date . ' &#9679; Time: ' . $time .
            ' &#9679; Room: ' . $room . '</p>';

        echo '<p>Current Description: <br/><span style="margin-left: 20px;"><i>'
            . $descp . '</i></span></p>';
        echo '</div>';
    }
    echo '<button class="btn btn-default btn-md" data-toggle="modal" data-target="#modal">Drop</button>';
    ?>
    <br/><br/>
    <a href="booking.php">Return to main menu</a>

    <div class="modal fade" tabindex="-1" role="dialog" id="modal">
        <form action="action_dropReservation.php" method="post">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Drop a reservation </h4>
                    </div>
                    <div class="modal-body">
                        <select name="id_reservation_drop">
                            <option value="">Select reservation </option>
                            <?php
                                foreach($reservation as $r) {
                                    $id = $r['id'];
                                    echo '<option value="' . $id .'"name="' . $id .'">' . $id . '</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="submit">Drop Reservation</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
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