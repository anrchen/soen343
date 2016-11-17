<?php
    session_start();
    include_once 'objects/Console.php';
    include_once 'objects/TimeSlot.php';

    // Retrieving data from form
    $description = $_GET['description'];
    $roomNumber = $_GET['roomNumber'];
    $startTime = $_GET['startTime'];
    $endTime = $_GET['endTime'];
    $user = $_SESSION['login_user'];
    $date = $_GET['date'];



    $catalog = new ReservationCatalog();
    $session = new ReservationSession($catalog);
    $console = new Console($catalog,$session);

    $timeslot = new TimeSlot($startTime,$endTime, $date);
    $result = $console->addRoom($roomNumber,$timeslot,$user,$description); //returns true if query was success, false if not

//  $catalog->display();
    $catalog->updateDB();

    if($result == ""){
        header('Location: ' . 'booking.php?valid=false&action=add');
    } else {
        header('Location: ' . 'booking.php?valid=true&action=add');
    }
?>