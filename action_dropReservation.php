<?php
    session_start();
    include_once 'objects/Console.php';

    $reservationDrop = $_POST['id_reservation_drop'];
    $user = $_SESSION['login_user'];
//    $reservationDrop='123';
//    $user='chen';

    $roomCatalog = new RoomCatalog();
    $waitList = new WaitList();	
	$console = new Console($roomCatalog, $waitList);
    $catalog = new ReservationCatalog();
	
	$console->initiateReservationSession($catalog);
    $waitList->updateWaitListObject();
    $console->proceedNextReservation($reservationDrop);
    $console->updateWaitList();
    $console->dropReservation($reservationDrop);
    $console->endReservationSession();

    $result = $catalog->querySuccess();

    if($result == ""){
        header('Location: ' . 'booking.php?valid=false&action=drop');
    } else {
        header('Location: ' . 'booking.php?valid=true&action=drop');
    }
?>