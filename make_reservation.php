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
                    session_start();
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
    $rooms = array("H908", "H432", "H843", "H123", "H732", "H320"); //data structure for the rooms
    $timeslots = array("7-10", "10-13", "13-16", "16-19", "19-22");
    ?>

    <form action="action_makeReservation.php">
        <div class="container">
            <h3>Create a Reservation</h3>

            <div class="row" style="margin-top: 30px;">
                <div class="col-lg-4">
                    <label for="sel1">Select a room:</label>
                    <select class="form-control" id="roomMenu" name="roomNumber">
                        <option value="">Select Room</option>
                        <?php
                            foreach($rooms as $room){
                                echo '<option value="' . $room . '">' . $room . "</option>";
                            }
                        ?>
                    </select>

                    <br/><br/>

                    <div class="col-lg-6">
                        <strong>Start time:</strong> <input type="text" class="form-control" id="startInput" name="startTime">
                    </div>

                    <div class="col-lg-6">
                        <strong>End time:</strong> <input type="text" class="form-control" id="endInput" name="endTime">
                    </div>
                    <br>
                </div>

                <div class="col-lg-offset-1 col-lg-4">
                    <label>Description</label>
                    <textarea class="form-control" rows="7" name="description"
                    placeholder="Provide reason for booking (if specifically used for a course, provide course number)."></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="date" id="date" placeholder="Choose Date">
                </div>
            </div>

            <br/>

            <button type="submit" class="btn btn-primary">Add Reservation</button>

            <br/><br/>

            <a href="index.php">Return to main page</a>
        </div>
    </form>
</body>


<footer>
    <p>All rights reserved</p>
</footer>


<!--JQuery-->
<!--       Source: jQuery UI Datepicker -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $( function() {
        $( "#date" ).datepicker();
    } );
</script>
<!--end of Datepicker -->

<!--Bootstrap js-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>