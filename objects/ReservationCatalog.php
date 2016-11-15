<?php

    include (__DIR__.'\Reservation.php');
    include (__DIR__.'\TimeSlot.php');

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
                echo"<br>";
            }
        }

        public function updateDB(){
            for ($i = 0; $i < sizeof($this->reservations); $i++){
                $this->reservations[$i]->updateDB();
            }
        }

        public function updateCatalogUser($user){
            $con = new Connection();
            $sql = "SELECT * FROM reservation
                    INNER JOIN timeslot ON reservation.id = timeslot.ReservationID
                    WHERE loginID='$user'";
            $con->setQuery($sql);
            $con->executeQuery();
            $result = $con->getResult();

            if ($result->num_rows > 0) {
                // output data
                while($row = $result->fetch_assoc()) {
                    $timeSlot = new TimeSlot($row["StartTime"],$row["EndTime"],$row["date"]);
                    $reservation = new Reservation($row["roomID"],$timeSlot,$user,$row["description"]);
                    $reservation->setID($row["id"]);
                    array_push($this->reservations, $reservation);
                }
            }
        }

        public function updateCatalogObject(){
            $con = new Connection();
            $sql = "SELECT * FROM reservation
                    INNER JOIN timeslot ON reservation.id = timeslot.ReservationID";
            $con->setQuery($sql);
            $con->executeQuery();
            $result = $con->getResult();

            if ($result->num_rows > 0) {
                // output data
                while($row = $result->fetch_assoc()) {
                    $timeSlot = new TimeSlot($row["StartTime"],$row["EndTime"],$row["date"]);
                    $reservation = new Reservation($row["roomID"],$timeSlot,$row["loginID"],$row["description"]);
                    $reservation->setID($row["id"]);
                    array_push($this->reservations, $reservation);
                }
            }
        }

    }

?>