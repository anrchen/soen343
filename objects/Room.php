<?php

class Room{

    //the only attribute we need is the room number
    private $roomNumber;

    public function __construct($roomNumber){
        $this->roomNumber = $roomNumber;
    }

    public function getRoomNumber(){
        return $this->roomNumber;
    }

    /*
    public function display(){
        echo "Displaying the room: \n". $this->roomNumber."<br>";
    }
    */
}

?>