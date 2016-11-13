<?php

    include (__DIR__.'\Room.php');
    include_once (__DIR__.'\TimeSlot.php');

    class RoomCatalog{
        private $rooms = [];

        public function __construct()
        {
        }

        public function addNewRoom($roomNumber){
            $room = new Room($roomNumber);
            array_push($this->rooms, $room);
        }

        public function display(){
            echo "Displaying the room catalog<br>";
            for ($i = 0; $i < sizeof($this->rooms); $i++){
                $this->rooms[$i]->display();
            }
        }
    }

?>