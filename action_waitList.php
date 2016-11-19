<?php

    include_once ('objects/WaitList.php');
    $wait = new WaitList();
    $wait->updateWaitListObject();
    $wait->display();

    $reservation = $wait->nextReservation();
//    $reservation->display();
?>