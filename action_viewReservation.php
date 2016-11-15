<?php
    include_once ('objects/ReservationCatalog.php');
    session_start();

    $catalog = new ReservationCatalog();
//    $catalog->updateCatalogUser($_SESSION['login_user']);
    $catalog->updateCatalogObject();
    $catalog->display();
?>