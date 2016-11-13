<?php

    include (__DIR__.'\Reservation.php');

    class ReservationCatalog{
        private $reservations = [];

        public function __construct()
        {
        }

        public function makeNewReservation($roomNumber, $timeSlot, $user, $description){
            $reservation = new Reservation($roomNumber, $timeSlot, $user, $description);
            array_push($this->reservations, $reservation);
        }

        public function display(){
            echo "Displaying the reservation catalog<br>";
            for ($i = 0; $i < sizeof($this->reservations); $i++){
                $this->reservations[$i]->display();
            }
        }

        public function updateDB(){
            for ($i = 0; $i < sizeof($this->reservations); $i++){
                $this->reservations[$i]->updateDB();
            }
        }
    }

?>