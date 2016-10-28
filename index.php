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
            if(isset($_GET['date'])){
                $date = new DateTime($_GET['date']); // If date is given by the url, go directly to that date
            }else{
                date_default_timezone_set('America/New_York'); //Eastern time
                $date= date_create('now'); //Creation of the date object, 'now' stands for current date
            }

            $rooms = array("H908", "H432", "H843", "H123", "H732", "H320"); //data structure for the rooms
            $bool_test = true; //A testing variable
        ?>

        <div class="container" style="margin-top:40px;">

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


            <?php


//                $prev_date = date('Y-m-d', strtotime($date .' -1 day'));
//                $next_date = date('Y-m-d', strtotime($date .' +1 day'));
//
//                $prev_url = "index.php?date=" .date_format($prev_date, 'Y-m-d');
//                $next_url = "index.php?date=" .date_format($next_date, 'Y-m-d');
//
//                echo
//                "<a id=\"prev_date\" href=\"$prev_url\">
//                    <i class=\"fa fa-arrow-left\" aria-hidden=\"true\">
//                        Previous date
//                    </i>
//                 </a>";
//
//                echo
//                "<a id=\"next_date\" href=\"$next_url\">
//                    <i class=\"fa fa-arrow-right\" aria-hidden=\"true\" style=\"float:right\">
//                        Next date
//                    </i>
//                 </a>";
//            ?>

<!--            <a id="prev_date" href="index.php?date=prev_date"><i class="fa fa-arrow-left" aria-hidden="true">Previous date</i></a>-->
<!--            <a id="next_date" href="index.php?date=next_date"><i class="fa fa-arrow-right" aria-hidden="true" style="float:right">Next date</i></a>-->
            <?php

            echo $date;
                if(isset($_GET['next_id']) & isset($_GET['date'])){

                    $date = new DateTime($next_date);
                } else if (isset($_GET['previous_id']) & isset($_GET['date'])){
                    $date = new DateTime($prev_date);
                }
            ?>

            <h4 id="date"><?php echo date_format($date,"Y-m-d"); ?></h4>
            <table style="width:80%" align="center">
                <tr>
                    <th>Room Numbers</th>
                    <th>7 - 10</th>
                    <th>10 - 13</th>
                    <th>13 - 16</th>
                    <th>16 - 19</th>
                    <th>19 - 22</th>
                </tr>
                <?php
                //Prints out each row : room and date of time slot
                    foreach($rooms as $room){
                        echo '<tr>';
                        echo '<td>' . $room . '</td>';
                        for($i = 0; $i < 5; $i++){
                            if($bool_test){
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
                     <button class="btn btn-warning">Make a Reservation</button>
                     <button class="btn btn-info">Modify a Reservation</button>
                     <button class="btn btn-danger">Drop a Reservation</button>
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