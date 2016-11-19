<?php

    include_once ('objects/WaitList.php');
    $wait = new WaitList();
    $wait->display();

    $reservation = $wait->nextReservation();
    $wait->display();
//    $reservation->display();
?>