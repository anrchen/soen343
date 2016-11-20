<?php
    session_start();
    include_once 'objects/Console.php';

    $reservationModify = $_POST['id_reservation_modify'];
    $newDescription = $_POST['newDescription'];

    $roomCatalog = new RoomCatalog();
    $catalog = new ReservationCatalog();
    $session = new ReservationSession($catalog);
    $console = new Console($catalog, $session, $roomCatalog);

    $catalog->updateCatalogByUser($_SESSION['login_user']);
    $console->modifyReservation($reservationModify, $newDescription);
    $result = $catalog->querySuccess();


    if($result == ""){
        header('Location: ' . 'booking.php?valid=false&action=modify');
    }
    else {
        header('Location: ' . 'booking.php?valid=true&action=modify');
    }
?>