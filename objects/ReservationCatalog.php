<?php

    include (__DIR__.'\Reservation.php');

    class ReservationCatalog{
        private $reservations = [];

        public function __construct()
        {
        }

        public function makeNewReservation($roomNumber, $timeSlot, $user){
            $room = new Reservation($roomNumber, $timeSlot, $user);
            array_push($this->reservations, $room);
        }

        public function display(){
            echo "Displaying the reservation catalog<br>";
            for ($i = 0; $i < sizeof($this->reservations); $i++){
                $this->reservations[$i]->display();
            }
        }
    }

?>