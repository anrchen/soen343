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
        echo "Start time: \n". $this->timeSlot->getStart()."<br>";
        echo "End time: \n". $this->timeSlot->getEnd()."<br>";
    }

    public function updateDB(){
        // Updating reservation table's data
        $con = new Connection();
        $sql = "INSERT INTO reservation (roomID,loginID,description) 
          VALUES ('$this->roomNumber','$this->user','$this->description')";
        $con->setQuery($sql);
        $con->insertQuery();

        // Updating timeslot table's data
        $date = $this->timeSlot->getDate();
        $id = $con->getID();
        $startDate = $this->timeSlot->getStart();
        $endDate = $this->timeSlot->getEnd();

        $sql = "INSERT INTO timeslot (StartTime,EndTime,date,ReservationID)
          VALUES ('$startDate','$endDate','$date','$id')";
        $con->setQuery($sql);
        $con->insertQuery();

        $con->close();
    }
}

?>