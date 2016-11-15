<?php
    include_once ('objects/ReservationCatalog.php');
    session_start();

    $catalog = new ReservationCatalog();
    $catalog->updateCatalogObject($_SESSION['login_user']);
    $catalog->display();
?>