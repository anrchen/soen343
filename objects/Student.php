<?php

    class Student{

        private $numberOfReservation;
        private $user;

        public function __construct($user)
        {
            $this->user=$user;
        }

        public function getUserNumberReservations(){
            $con = new Connection();
            $sql = "SELECT * FROM reservation
                    INNER JOIN timeslot ON reservation.id = timeslot.ReservationID and
                    Reservation.loginID='$this->user'";
            $con->setQuery($sql);
            $con->executeQuery();
            $result = $con->getResult();
            return $this->numberOfReservation=$result->num_rows;
        }
    }

?>