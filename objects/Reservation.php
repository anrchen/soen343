<?php

include_once (__DIR__.'/../connection.php');

class Reservation{

    private $roomNumber;
    private $timeSlot;
    private $user;
    private $description;

    public function __construct($roomNumber, $timeSlot, $user, $description)
    {
        $this->roomNumber=$roomNumber;
        $this->timeSlot=$timeSlot;
        $this->user=$user;
        $this->description=$description;
    }

    public function display(){
        echo "Room booked by: \n". $this->user."<br>";
        echo "Room number: \n". $this->roomNumber."<br>";
        echo "Description: \n". $this->description."<br>";
    }

    public function updateDB(){
        $con = new Connection();
        $sql = "INSERT INTO reservation (roomID,loginID,description) 
          VALUES ('$this->roomNumber','$this->user','$this->description')";
        $con->setQuery($sql);
        $con->insertQuery();

//        $startTime = $this->timeSlot->getStart();
//        $endTime = $this->timeSlot->getEnd();
//        $date = $this->timeSlot->getDate();

//        $sql = "INSERT INTO timeslot (StartTime,EndTime,date,ReservationID)
//          VALUES ('$startTime','$endTime','','$con->getID')";
        $con->close();
    }
}

?>