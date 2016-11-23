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

    $roomCatalog = new RoomCatalog();
    $waitList = new WaitList();	
	$console = new Console($roomCatalog, $waitList);
    $catalog = new ReservationCatalog();
    $timeslot = new TimeSlot($startTime,$endTime, $date);
	
    $console->initiateReservationSession($catalog);	
    $waitList->updateWaitListObject();
    $result = $console->addReservation($roomNumber,$timeslot,$user,$description); //returns true if query was success, false if not
    $console->endReservationSession();

    if($result==''){
        $catalog->updateDB();
        $roomCatalog->unlockRoom($user);
        header('Location: ' . 'booking.php?valid=true&action=add');
    }else{
        $_SESSION['reservation']=$catalog->getTempReservation();
        include_once('make_reservationWaitList.php');
    }

?>