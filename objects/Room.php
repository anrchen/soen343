<?php

class Room{

    //the only attribute we need is the room number
    private $roomNumber;
    private $waitList;

    public function __construct($roomNumber){
        $this->roomNumber = $roomNumber;
    }

//    public function updateRoomObject(){
//            $con = new Connection();
//            $sql = "SELECT * FROM room
//                    WHERE roomNumber='$this->roomNumber'
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
//            $reservations = array();
//            if ($result->num_rows > 0) {
//                // output data
//                while($row = $result->fetch_assoc()) {
//                    $timeSlot = new TimeSlot($row["StartTime"],$row["EndTime"],$row["date"]);
//                    $reservation = new Reservation($row["roomNumber"], $timeSlot, $row["loginID"], $row["description"]);
//                    array_push($reservations, $reservation);
//                }
//            }
//
//            $waitList = new WaitList($reservations,);
//    }

    public function getRoomNumber(){
        return $this->roomNumber;
    }

    /*
    public function display(){
        echo "Displaying the room: \n". $this->roomNumber."<br>";
    }
    */
}

?>