<?php

    class ReservationCatalog{
        private $rooms;

        public function __construct()
        {
        }

        public function makeNewRoom($roomNumber, $time, $user){
            $room = new Room($roomNumber, $time, $user);
            array_push($this->rooms, $room);
            $this->display();
        }

        public function display(){
            echo "Displaying the reservation catalog";
            for ($i = 0; $i < sizeof($this->rooms); $i++){
                echo $this->rooms[$i];
            }
        }
    }

?>