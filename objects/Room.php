<?php

class Room{

    private $roomNumber;
    private $time;
    private $user;

    public function __construct($roomNumber, $time, $user){
        $this->roomNumber = $roomNumber;
        $this->time = $time;
        $this->user = $user;
    }

    public function display(){
        echo "Displaying the room: \n". $this->roomNumber;
    }
}

?>