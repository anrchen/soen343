<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

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
                    <?php
                        session_start();
                        if(isset($_SESSION['login_user'])){
                            echo"
                                <a href=\"index.php\">Log out</a>
                            ";
                        }else{
                            echo"
                                <a href=\"index.php\">Log in</a>
                            ";
                        }
                    ?>
                    <a href="#">About</a>
                    <a href="#">Support</a>
                </nav>
            </div>
        </header>

        <?php
            if(isset($_GET['date'])){
                $date = new DateTime($_GET['date']); // If date is given by the url, go directly to that date
            }else{
                date_default_timezone_set('America/New_York'); //Eastern time
                $date= date_create('now'); //Creation of the date object, 'now' stands for current date
            }

            $rooms = array("H908", "H432", "H843", "H123", "H732", "H320"); //data structure for the rooms
            $timeslots = array("7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22");

            include_once ('action_viewReservation.php');

            //For testing purposes
            //Reservation of all with the same date -> November 19
//            $reservation = array(
//                ["room" => "H908", "start_time" => "7", "end_time" => "9", "username" => "charizard"],
//                ["room" => "H732", "start_time" => "8", "end_time" => "9", "username" => "trump"],
//                ["room" => "H123", "start_time" => "17", "end_time" => "20", "username" => "adriel"]
//                );

        ?>

        <div class="container" style="margin-top:20px;">


            <?php
                $user = $_SESSION['login_user'];
                echo '<h2>Welcome <span>' . $user . '</span><small>. Click on reservation for detailed information</small></h2>';
            ?>


            <?php
                //Display of the message. Either confirmation or error.
                if (isset($_GET['valid']) && isset($_GET['action'])) {
                    $result = $_GET['valid'];
                    $action = $_GET['action'];
                    if($result){
                        if ($action == 'drop'){
                            echo '<h6 style="color:green; font-size: 20px;">The reservation was successfully dropped</h6>';
                        } else if($action == 'modify'){
                            echo '<h6 style="color:green; font-size: 20px;">The reservation was successfully modified</h6>';
                        } else{
                            echo '<h6 style="color:green; font-size: 20px;">The reservation was successfully added</h6>';
                        }
                    }
                    else {
                        echo '<h6 style="color:red; font-size: 20px;">There was a problem with the procedure.</h6>';
                    }
                } else {
                    echo '';
                }
            ?>

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
                $add = false; //This is the boolean that will determine if a reservation slot is reserved or not
                //Prints out each row : room and date of time slot
                    foreach($rooms as $room){
                        echo '<tr>';
                        echo '<td>' . $room . '</td>';
                        for($i = 0; $i < sizeof($timeslots); $i++){
                            $add = false;
                            for($j = 0; $j < sizeof($reservation); $j++) {
                                if ($timeslots[$i] == $reservation[$j]["start_time"] && $reservation[$j]["room"] == $room) {
                                    $add = true; //search successful! store the data to be displayed in these variables
                                    $display_name = $reservation[$j]["username"];
                                    $reservation_id = $reservation[$j]["id"];
                                    $description = $reservation[$j]["description"];
                                    $end_data = (int)$reservation[$j]["end_time"];
                                    $start_data = (int)$reservation[$j]["start_time"];
                                    $duration = $end_data - $start_data;

                                }
                            }
                            if($add){
                                echo '<td colspan="' . $duration . '" style="background-color: red"><a href="#" id="blue"
                                data-toggle="modal" data-id="'.$description.'" onclick="myFunction(this)" data-target="#theModal">' . $display_name . '</a></td>';
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
                    <a href="action_checkNumberReservation.php"><button class="btn btn-warning">Make a Reservation</button></a>
                     <a href="modify_reservation.php"><button class="btn btn-info">Modify a Reservation</button></a>
                     <a href="drop_reservation.php"><button class="btn btn-danger">Drop a Reservation</button></a>
                </div>
            </div>

            <div class="modal fade" tabindex="-1" role="dialog" id="theModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Description</h4>
                        </div>
                        <div class="modal-body">
                            <p id="description"></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.container-->

    </body>

    <footer>
        <p>All rights reserved</p>
    </footer>

    <script>
        function myFunction(selector){
            var a = $(selector).data('id');
            document.getElementById('description').innerText = a;
        }
    </script>

    <!--JQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!--Bootstrap js-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </body>
</html>