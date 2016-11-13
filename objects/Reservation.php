<?php

class Reservation{

    private $roomNumber;
    private $timeSlot;
    private $user;

    public function __construct($roomNumber, $timeSlot, $user)
    {
        $this->roomNumber=$roomNumber;
        $this->timeSlot=$timeSlot;
        $this->user=$user;
    }

    public function display(){
        echo "Room booked by: \n". $this->user."<br>";
        echo "Room number: \n". $this->roomNumber."<br>";
    }
}

?>