<?php

    include_once ('objects/WaitList.php');
    include_once ('objects/Console.php');

    session_start();

    $roomCatalog = new RoomCatalog();
    $waitList = new WaitList();	
	$console = new Console($roomCatalog, $waitList);
    $catalog = new ReservationCatalog();
	
	$console->initiateReservationSession($catalog);	
	$waitList->updateWaitListObject();
    $console->addReservationToWaitList($_SESSION['reservation']);
    $console->updateWaitList();

    $roomCatalog->unlockRoom($_SESSION['login_user']);

    header('Location: ' . 'booking.php?valid=true&action=add');
?>