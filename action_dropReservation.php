<?php
    session_start();
    include_once 'objects/Console.php';

    $reservationDrop = $_POST['id_reservation_drop'];
    $user = $_SESSION['login_user'];

    $roomCatalog = new RoomCatalog();
    $catalog = new ReservationCatalog();
    $catalog->updateCatalogObject();
    $session = new ReservationSession($catalog);
    $wait = new WaitList();
    $console = new Console($session, $roomCatalog, $wait);

    $console->proceedNextReservation($reservationDrop);
    $console->updateWaitList();
    $console->dropReservation($reservationDrop);
    echo $reservationDrop;

    $result = $catalog->querySuccess();

    if($result == ""){
        header('Location: ' . 'booking.php?valid=false&action=drop');
    } else {
        header('Location: ' . 'booking.php?valid=true&action=drop');
    }
?>