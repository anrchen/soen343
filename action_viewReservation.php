<?php
    include_once ('objects/ReservationCatalog.php');

    $catalog = new ReservationCatalog();
    $date = $date->format('m/d/Y');
    $catalog->updateCatalogByDate($date);
    $reservation=$catalog->getCalendar();
?>