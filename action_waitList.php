<?php

    include_once ('objects/WaitList.php');
    include_once ('objects/Console.php');

    session_start();

    $catalog = new ReservationCatalog();
    $session = new ReservationSession($catalog);
    $roomCatalog = new RoomCatalog();
    $console = new Console($catalog,$session,$roomCatalog);

    $wait = new WaitList();
    $wait->addReservation($_SESSION['reservation']);
    $wait->updateDB();

    header('Location: ' . 'booking.php?valid=true&action=add');
?>