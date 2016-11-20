<?php
    if(isset($_GET['deleteOld'])){
        var_dump($_SESSION['reservation']);
//        header('Location: ' . 'booking.php?valid=false&action=drop');
    }
    include_once ('action_lockRoom.php');

//    function lockRoom($value){
//        $_SESSION['lock']=$value;
//        echo 'it is done '.$value;
//
//        include_once ('action_lockRoom.php');
//    }
?>

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
//                    session_start();
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

    <?php
    //    $rooms = array("H908", "H432", "H843", "H123", "H732", "H320");
        include_once ('action_viewRooms.php');
//        var_dump($roomNumber);
    ?>

    <form action="action_makeReservation.php" name="makeReservationForm" onsubmit="return validateForm();">
        <div class="container">
            <h2>Create a Reservation.<small>Fill in all the fields to add a reservation</small></h2>
            <p id="display"></p>


            <div class="row" style="margin-top: 30px;">
                <div class="col-lg-4">
                    <label for="sel1">Select a room:</label>
                    <select class="form-control" id="Room" name="roomNumber" onchange="lockRoom(this)">
                        <option value="">Select Room</option>
                        <?php
                            foreach($roomNumber as $room){
                                echo '<option value="' . $room . '">' . $room . "</option>";
                            }
                        ?>
                    </select>

                    <br/><br/>

                    <div class="col-lg-6">
                        <strong>Start time:</strong> <input type="text" class="form-control" id="StartTime" name="startTime">
                    </div>

                    <div class="col-lg-6">
                        <strong>End time:</strong> <input type="text" class="form-control" id="EndTime" name="endTime">
                    </div>
                    <br>
                </div>

                <div class="col-lg-offset-1 col-lg-4">
                    <label>Description</label>
                    <textarea class="form-control" rows="7" name="description" id="Description"
                    placeholder="Provide reason for booking (if specifically used for a course, provide course number)."></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="date" id="Date" placeholder="Choose Date">
                </div>
            </div>

            <br/>

            <button type="submit" name="submit" class="btn btn-primary" value="Submit">Add Reservation</button>

            <br/><br/>

            <a href="booking.php">Return to main page</a>
        </div>
    </form>
</body>


<footer>
    <p>All rights reserved</p>
</footer>

<script src="assets/js/makeReservation_validation.js"></script>
<!--JQuery-->
<!--       Source: jQuery UI Datepicker -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $( function() {
        $( "#Date" ).datepicker();
    } );
</script>
<!--end of Datepicker -->

<!--Bootstrap js-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="lockRoom.js"></script>

</body>
</html>