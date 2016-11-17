<?php
    session_start();
    include_once 'objects/Console.php';

    $reservationModify = $_POST['id_reservation_modify'];
    $newDescription = $_POST['newDescription'];

    $catalog = new ReservationCatalog();
    $session = new ReservationSession($catalog);
    $console = new Console($catalog, $session);

    $console->modifyReservation($reservationModify, $newDescription);
    $result = $catalog->querySuccess();

    if($result == ""){
        header('Location: ' . 'modify_reservation.php?valid=false');
    }
    else {
        header('Location: ' . 'modify_reservation.php?valid=true');
    }
/*
    $catalog->updateCatalogUser($_SESSION['login_user']);
    $catalog->display();
*/
?>