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
    $catalog->updateCatalogObject();
    $roomCatalog = new RoomCatalog();
    $session = new ReservationSession($catalog);
    $console = new Console($catalog,$session, $roomCatalog);

    $timeslot = new TimeSlot($startTime,$endTime, $date);

    $result = $console->addReservation($roomNumber,$timeslot,$user,$description); //returns true if query was success, false if not


    if($result==''){
        $catalog->updateDB();
        header('Location: ' . 'booking.php?valid=true&action=add');
    }else{
        $_SESSION['reservation']=$catalog->getTempReservation();
        include_once('make_reservationWaitList.php');
    }

?>