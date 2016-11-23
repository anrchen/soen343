<?php

    include (__DIR__.'/Room.php');
    include_once (__DIR__.'/TimeSlot.php');
include_once (__DIR__.'/Reservation.php');

    class RoomCatalog{
        private $rooms = [];

        public function __construct()
        {
            $this->updateCatalogObject();
        }

        // Populating the Room objects that are not in the waiting list
        public function updateCatalogObject(){
            $con = new Connection();
            $sql = "SELECT * FROM Room
                    LEFT JOIN RoomLock
                    ON Room.roomNumber=RoomLock.lockRoom
                    WHERE lockRoom IS NULL";
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


        public function display(){
            echo "Displaying the room catalog<br>";
            for ($i = 0; $i < sizeof($this->rooms); $i++) {
                $this->rooms[$i]->display();
            }
        }

        // Since one user is only allowed to use one session at a time, once the user has
        // reservation his room, any room (although number of room should only be one) locked
        // by this user should be released.
        public function unlockRoom($user){
            $con = new Connection();
            $sql = "DELETE FROM RoomLock WHERE userName='$user'";
            $con->setQuery($sql);
            $this->valid = $con->executeQuery();
        }

        public function lockRoom($roomNumber, $username){
            $room = $this->getRoom($roomNumber);
            $room->lockRoom($roomNumber, $username);
        }

    }

?>