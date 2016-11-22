<?php
    include_once ('objects/Console.php');

    $catalog = new ReservationCatalog();
    $roomCatalog = new RoomCatalog();
    $session = new ReservationSession($catalog);
    $wait = new WaitList();
    $wait->updateWaitListObject();
    $console = new Console($session, $roomCatalog, $wait);

    $roomNumber = $console->getAllRoomNumber();

?>