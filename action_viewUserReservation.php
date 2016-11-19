<?php
    include_once ('objects/ReservationCatalog.php');

    $user = $_SESSION['login_user'];

    $catalog = new ReservationCatalog();
    $catalog->updateCatalogByUser($user);
    $reservation = $catalog->getCalendar();

?>