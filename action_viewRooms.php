<?php
    include_once ('objects/Console.php');

    $catalog = new ReservationCatalog();
    $roomCatalog = new RoomCatalog();
    $session = new ReservationSession($catalog);
    $wait = new WaitList();
    $console = new Console($session, $roomCatalog, $wait);

    $roomCatalog->updateCatalogObject();
    $roomNumber = $console->getAllRoomNumber();

?>