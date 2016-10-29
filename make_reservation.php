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

</head>

<body style="background-color: #E3E3E3">
<div id="banner">Booking System</div>

<?php
$rooms = array("H908", "H432", "H843", "H123", "H732", "H320"); //data structure for the rooms
$timeslots = array("7-10", "10-13", "13-16", "16-19", "19-22");
?>

<div class="container">
    <h3>Create a Reservation</h3>

    <div class="row">
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
        </div>
    </div>

    <br/>

    <div class="row">
        <div class="col-lg-4">
            <label for="sel1">Select timeslot:</label>
            <select class="form-control" id="timeMenu">
                <option value="">Select timeslot</option>
                <?php
                foreach($timeslots as $timeslot){
                    echo '<option value="' . $timeslot . '">' . $timeslot . '</option>';
                }
                ?>
            </select>
        </div>
    </div>

    <br/>

    <div class="row">
        <div class="col-lg-4">
            <label>Enter Date</label> (Example: 2016-10-28)
            <input type="text" class="form-control" id="dateInput">
        </div>
    </div>

    <br/>

    <button type="button" class="btn btn-primary" onclick="display()">Add Reservation</button>

    <br/><br/>

    <a href="index.php">Return to main page</a>
</div>

<script>
    function display() {
        var x = document.getElementById('roomMenu').value;
        var y = document.getElementById('timeMenu').value;
        var z = document.getElementById('dateInput').value;
        window.location.href = "addBooking.php?room=" + x + "&time=" + y + "&date=" + z;
    }
</script>
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