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
        echo "Displaying the room: \n". $this->roomNumber."<br>";
    }
}

?>