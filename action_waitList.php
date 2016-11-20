<?php

    include_once ('objects/WaitList.php');
    include_once ('objects/Console.php');

    session_start();

    $catalog = new ReservationCatalog();
    $session = new ReservationSession($catalog);
    $roomCatalog = new RoomCatalog();
    $wait = new WaitList();
    $console = new Console($catalog,$session,$roomCatalog,$wait);

    $console->addReservationToWaitList($_SESSION['reservation']);
    $console->updateWaitList();

    header('Location: ' . 'booking.php?valid=true&action=add');
?>