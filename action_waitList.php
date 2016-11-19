<?php

    include_once ('objects/WaitList.php');
    include_once ('objects/Console.php');

    session_start();

    $catalog = new ReservationCatalog();
    $session = new ReservationSession($catalog);
    $roomCatalog = new RoomCatalog();
    $console = new Console($catalog,$session,$roomCatalog);

//    var_dump($_SESSION['reservation']);
    $wait = new WaitList();
    $wait->addReservation($_SESSION['reservation']);
    $wait->updateDB();
//    $wait->display();

//    $reservation = $wait->nextReservation();
//    $wait->display();
//    $reservation->display();
?>