<?php

class Room{

    //the only attribute we need is the room number
    private $roomNumber;
    private $waitList;

    public function __construct($roomNumber,$waitList){
        $this->roomNumber = $roomNumber;
        $this->waitList = $waitList;
    }

    public function display(){
        echo "Displaying the room: \n". $this->roomNumber."<br>";
    }
}

?>