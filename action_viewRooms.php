<?php
    include_once ('objects/Console.php');

    $catalog = new ReservationCatalog();
    $roomCatalog = new RoomCatalog();
    $session = new ReservationSession($catalog);
    $console = new Console($catalog, $session, $roomCatalog);

    $roomCatalog->updateCatalogObject();
    $roomNumber = $console->getAllRoom();
?>