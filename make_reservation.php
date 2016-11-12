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
                <a href="#">Log in</a>
                <a href="#">About</a>
            </nav>
        </div>
    </header>

    <?php
    $rooms = array("H908", "H432", "H843", "H123", "H732", "H320"); //data structure for the rooms
    $timeslots = array("7-10", "10-13", "13-16", "16-19", "19-22");
    ?>

    <form action="objects/ReservationSession.php">
        <div class="container">
            <h3>Create a Reservation</h3>

            <div class="row" style="margin-top: 30px;">
                <div class="col-lg-4">
                    <label for="sel1">Select a room:</label>
                    <select class="form-control" id="roomMenu">
                        <option value="">Select Room</option>
                        <?php
                            foreach($rooms as $room){
                                echo '<option value="' . $room . '">' . $room . "</option>";
                            }
                        ?>
                    </select>

                    <br/><br/>

                    <div class="col-lg-6">
                        <strong>Start time:</strong> <input type="text" class="form-control" id="startInput" name="startInput">
                    </div>

                    <div class="col-lg-6">
                        <strong>End time:</strong> <input type="text" class="form-control" id="endInput" name="endInput">
                    </div>
                    <br>
                </div>

                <div class="col-lg-offset-1 col-lg-4">
                    <label>Description</label>
                    <textarea class="form-control" rows="7" name="descpInput"
                    placeholder="Provide reason for booking (if specifically used for a course, provide course number)."></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <label>Enter Date (Format: YYYY-MM-DD)</label>
                    <input type="text" class="form-control" id="endInput" name="descpInput">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!--Bootstrap js-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>