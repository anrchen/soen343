<?php
    include ("test.php");

    var_dump($reservation);
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


    <?php
    if(isset($_GET['date'])){
        $date = new DateTime($_GET['date']); // If date is given by the url, go directly to that date
    }else{
        date_default_timezone_set('America/New_York'); //Eastern time
        $date= date_create('now'); //Creation of the date object, 'now' stands for current date
    }

    $rooms = array("H908", "H432", "H843", "H123", "H732", "H320"); //data structure for the rooms
    $timeslots = array("7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22");

    //For testing purposes
    //Reservation of all with the same date -> November 19

    $add = false; //This is the boolean that will determine if a reservation slot is reserved or not


    ?>

    <div class="container" style="margin-top:20px;">

        <?php
        $date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
        $prev_date = date('Y-m-d', strtotime($date .' -1 day'));
        $next_date = date('Y-m-d', strtotime($date .' +1 day'));
        ?>

        <a id="previous_id" href="?date=<?=$prev_date;?>">
            <i class="fa fa-arrow-left" aria-hidden="true">
                Previous
            </i>
        </a>
        <a id="next_id" href="?date=<?=$next_date;?>">
            <i class="fa fa-arrow-right" aria-hidden="true" style="float:right">
                Next
            </i>
        </a>

        <h4 id="date"><?php echo $date; ?></h4>
        <table style="width:80%" align="center">
            <tr>
                <th id="blue">Room Numbers</th>
                <?php
                foreach($timeslots as $slots){
                    echo '<th>' . $slots . '</th>';
                }
                ?>
            </tr>
            <?php
            //Prints out each row : room and date of time slot
            foreach($rooms as $room){
                echo '<tr>';
                echo '<td>' . $room . '</td>';
                for($i = 0; $i < sizeof($timeslots); $i++){
                    $add = false;
                    for($j = 0; $j < sizeof($reservation); $j++) {
                        if ($timeslots[$i] == $reservation[$j]["start"] && $reservation[$j]["room"] == $room
                            && $date == $reservation[$j]["date"]) {
                            $add = true; //search successful! store the data to be displayed in these variables
                            $display_name = $reservation[$j]["user"];
                            $end_data = (int)$reservation[$j]["end"];
                            $start_data = (int)$reservation[$j]["start"];
                            $duration = $end_data - $start_data + 1;
                        }
                    }
                    if($add){
                        echo '<td colspan="' . $duration . '" style="background-color: red">' . $display_name . '</td>';
                        $i = $i + ($duration-1);
                    }
                    else{
                        echo '<td></td>';
                    }
                }
                echo '</tr>';
            }
            ?>
        </table>
        <hr>
        <div class="row">
            <div class="col-lg-12 text-center">
                <a href="make_reservation.php"><button class="btn btn-warning">Make a Reservation</button></a>
                <a href="modify_reservation.php"><button class="btn btn-info">Modify a Reservation</button></a>
                <a href="drop_reservation.php"><button class="btn btn-danger">Drop a Reservation</button></a>
            </div>
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

