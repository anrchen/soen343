<?php

    include_once ('objects/WaitList.php');
    $wait = new WaitList();
    $wait->updateWaitListObject();
    $wait->display();

    $wait->nextReservation();
//    $reservation->display();
?>