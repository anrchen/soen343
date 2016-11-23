<?php

    include_once (__DIR__.'/Reservation.php');
    include_once (__DIR__.'/TimeSlot.php');

    class ReservationCatalog{
        private $reservations = [];
        protected $valid;
        private $tempReservation;

        public function __construct()
        {
        }

        public function makeNewReservation($roomNumber, $timeSlot, $user, $description){
            $reservation = new Reservation($roomNumber, $timeSlot, $user, $description);
            if($this->getConflict($reservation)==null){
                array_push($this->reservations, $reservation);
                return null;
            }
            $this->tempReservation = $reservation;
            return $reservation;
        }

        public function modifyReservation($reservationId, $newDescription){
			echo $reservationId;

            foreach($this->reservations as $reservation){
                if($reservation->getID() == $reservationId){			
                    $reservation->modifyReservation($newDescription);
					break;
                }
                
            }
        }

        public function dropReservation($reservationId){
            $con = new Connection();
            $sql = "DELETE FROM reservation WHERE id='$reservationId'";
            $con->setQuery($sql);
            $this->valid = $con->executeQuery();
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

        // Fetch all reservations by a given user
        public function updateCatalogByUser($user){
            $con = new Connection();
            $sql = "SELECT * FROM WaitList
                    RIGHT JOIN (
                        Reservation
                        INNER JOIN timeslot ON Reservation.id = timeslot.ReservationID
                    ) 
                    ON WaitList.ReservationID=Reservation.id
                    WHERE WaitList.ReservationID IS NULL and
                    Reservation.loginID='$user'";
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

        // Fetch all reservations
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

        // Fetch all reservations, that are not on the waitlists, by a given date
        public function updateCatalogByDate ($date){
            $con = new Connection();
            $sql = "SELECT * FROM WaitList
                    RIGHT JOIN (
                        Reservation
                        INNER JOIN timeslot ON Reservation.id = timeslot.ReservationID
                    ) 
                    ON WaitList.ReservationID=Reservation.id
                    WHERE WaitList.ReservationID IS NULL and
                    TimeSlot.date = '$date'";
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

        public function getCalendar(){
            $reservations = array();
            for ($i = 0; $i < sizeof($this->reservations); $i++){
                $reservation = array("room"=>$this->reservations[$i]->getRoom(),
                                        "start_time"=>$this->reservations[$i]->getTimeSlot()->getStart(),
                                        "end_time"=>$this->reservations[$i]->getTimeSlot()->getEnd(),
                                        "username"=>$this->reservations[$i]->getUser(),
                                        "description"=>$this->reservations[$i]->getDescription(),
                                        "date"=>$this->reservations[$i]->getTimeSlot()->getDate(),
                                        "id"=>$this->reservations[$i]->getID());
                array_push($reservations, $reservation);
            }
            return $reservations;
        }

        public function querySuccess(){
            return $this->valid;
        }

        public function getConflict($reservation){
            $reservations=array();

            $con = new Connection();
            $sql = "SELECT * FROM WaitList
                    RIGHT JOIN (
                        Reservation
                        INNER JOIN timeslot ON Reservation.id = timeslot.ReservationID
                    ) 
                    ON WaitList.ReservationID=Reservation.id
                    WHERE WaitList.ReservationID IS NULL";
            $con->setQuery($sql);
            $con->executeQuery();
            $result = $con->getResult();

            if ($result->num_rows > 0) {
                // output data
                while($row = $result->fetch_assoc()) {
                    $timeSlot = new TimeSlot($row["StartTime"],$row["EndTime"],$row["date"]);
                    $reserve = new Reservation($row["roomID"],$timeSlot,$row["loginID"],$row["description"]);
                    $reserve->setID($row["id"]);
                    array_push($reservations, $reserve);
                }
            }
            $con->close();

            foreach ($reservations as $r){
                if($r->getTimeSlot()->getDate() == $reservation->getTimeSlot()->getDate()
                    and $r->getRoom()==$reservation->getRoom()){
                    if(($r->getTimeSlot()->getStart() >= $reservation->getTimeSlot()->getEnd())
                    or ($r->getTimeSlot()->getEnd() <= $reservation->getTimeSlot()->getStart())){
                        // then there is no conflict
                    }else{
                        // else there is a conflict
                        return $reservation;
                    }
                }else{ // else there is no conflict
                }
            }
            return null;

        }

        public function getTempReservation(){
            $roomNumber = $this->tempReservation->getRoom();
            $user = $this->tempReservation->getUser();
            $description = $this->tempReservation->getDescription();

            $con = new Connection();
            $sql = "INSERT INTO reservation (roomID,loginID,description) 
          VALUES ('$roomNumber','$user','$description')";
            $con->setQuery($sql);
            $con->executeQuery();
            // Updating timeslot table's data
            $date = $this->tempReservation->getTimeSlot()->getDate();

            $id = $con->getID();
            $this->tempReservation->setID($id);

            $startDate = $this->tempReservation->getTimeSlot()->getStart();
            $endDate = $this->tempReservation->getTimeSlot()->getEnd();

            $sql = "INSERT INTO timeslot (StartTime,EndTime,date,ReservationID)
          VALUES ('$startDate','$endDate','$date','$id')";
            $con->setQuery($sql);
            $con->executeQuery();

            $con->close();

            return $this->tempReservation;
        }

        public function getReservation($reservationID){

            foreach($this->reservations as $reservation){
                if($reservation->getID()==$reservationID){
                    return $reservation;
                }
            }
        }


    }

?>