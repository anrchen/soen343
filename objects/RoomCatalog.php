<?php

    include (__DIR__.'\Room.php');

    class RoomCatalog{
        private $rooms = [];

        public function __construct()
        {
        }

            array_push($this->rooms, $room);
        }

        public function display(){
            echo "Displaying the room catalog<br>";
            for ($i = 0; $i < sizeof($this->rooms); $i++){
                $this->rooms[$i]->display();
            }
        }
    }

?>