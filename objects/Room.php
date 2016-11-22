<?php

class Room{

    private $roomNumber;

    public function __construct($roomNumber){
        $this->roomNumber = $roomNumber;
    }


    public function getRoomNumber(){
        return $this->roomNumber;
    }

    public function lockRoom($roomNumber, $username){
        $con = new Connection();
        $sql = "INSERT INTO RoomLock (lockRoom,userName) 
                VALUES ('$roomNumber','$username')";
        $con->setQuery($sql);
        $con->executeQuery();

        $con->close();
    }

    /*
    public function display(){
        echo "Displaying the room: \n". $this->roomNumber."<br>";
    }
    */
}

?>