<?php
    include_once ('objects/ReservationCatalog.php');
    include_once ('objects/WaitList.php');

    $user = $_SESSION['login_user'];

    $catalog = new ReservationCatalog();
    $catalog->updateCatalogByUser($user);
    $reservation = $catalog->getCalendar();

    $waitList = new WaitList();
    $waitList->updateWaitListByUser($user);
    $waitList_reservation = $waitList->getCalendar();
?>