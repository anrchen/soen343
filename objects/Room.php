<?php

class Room{

    private $roomNumber;

    public function __construct($roomNumber){
        $this->roomNumber = $roomNumber;
    }

    public function display(){
        echo "Displaying the room: \n". $this->roomNumber."<br>";
    }
}

?>