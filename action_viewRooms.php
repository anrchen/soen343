<?php
    include_once ('objects/Console.php');


    $catalog = new ReservationCatalog();
    $roomCatalog = new RoomCatalog();
    $wait = new WaitList();
	$console = new Console($roomCatalog, $wait);
	
	$console->initiateReservationSession($catalog);
	$wait->updateWaitListObject();
	
    $roomNumber = $console->getAllRoomNumber();

?>