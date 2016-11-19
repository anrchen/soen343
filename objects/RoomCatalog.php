<?php

    include (__DIR__.'\Room.php');
    include_once (__DIR__.'\TimeSlot.php');
include_once (__DIR__.'\Reservation.php');

    class RoomCatalog{
        private $rooms = [];

        public function __construct()
        {

        }

        public function updateCatalogObject(){
            $con = new Connection();
            $sql = "SELECT * FROM room";
            $con->setQuery($sql);
            $con->executeQuery();
            $result = $con->getResult();

            if ($result->num_rows > 0) {
                // output data
                while($row = $result->fetch_assoc()) {
                    $room = new Room($row["roomNumber"]);
                    array_push($this->rooms, $room);
                }
            }
        }
//        public function updateCatalogObject(){
//            $con = new Connection();
//            $sql = "SELECT * FROM room
//                    INNER JOIN Reservation
//                    ON Reservation.roomID=room.roomNumber
//                    INNER JOIN WaitList
//                    On WaitList.ReservationID=Reservation.id
//                    INNER JOIN timeSlot
//                    On timeSlot.ReservationID=Reservation.id";
//            $con->setQuery($sql);
//            $con->executeQuery();
//            $result = $con->getResult();
//
//            if ($result->num_rows > 0) {
//                // output data
//                while($row = $result->fetch_assoc()) {
//                    $timeSlot = new TimeSlot($row["StartTime"],$row["EndTime"]);
//                    $reservation = new Reservation($row["roomNumber"], $timeSlot, $row["loginID"], $row["description"]);
//                    $waitList = new WaitList();
//                    $room = new Room($row["roomNumber"]);
//                    array_push($this->rooms, $room);
//                }
//            }
//        }

        public function getRoom($roomNumber){
            foreach($this->rooms as $room){
                if($room->getRoomNumber() == $roomNumber){
                    return $room;
                }
            }
        }

        public function getAllRoomNumbers(){
            $roomNumber= [];
            foreach($this->rooms as $room){
                array_push($roomNumber, $room->getRoomNumber());
            }
            return $roomNumber;
        }

        /*
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
        */

    }

?>