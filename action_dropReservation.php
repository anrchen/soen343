<?php
    session_start();
    include_once 'objects/Console.php';

    $reservationDrop = $_POST['id_reservation_drop'];
    $user = $_SESSION['login_user'];

    $catalog = new ReservationCatalog();
    $session = new ReservationSession($catalog);
    $console = new Console($catalog, $session);

    $console->dropReservation($reservationDrop, $newDescription);
    $result = $catalog->querySuccess();
    if($result == ""){
        header('Location: ' . 'drop_reservation.php?valid=false');
    } else {
        header('Location: ' . 'drop_reservation.php?valid=true');
    }
?>