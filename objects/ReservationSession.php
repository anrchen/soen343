<?php

    Class ReservationSession{
        private $catalog;
        private $isComplete;

        public function __construct(ReservationCatalog $catalog)
        {
            $this->catalog= $catalog;
        }

        public function initiateRoomEntrySession(Student $student, ReservationCatalog $catalog){
            $this->isComplete = false;
            // Testing: TBD / To be deleted
            echo "Initializing Room entry session";
        }

        public function makeNewRoom($roomNumber, $time, $user, $description){
            if($this->isComplete){
                echo "Room entry session wasn't initialized...";
            } else{
                $this->catalog->makeNewReservation($roomNumber, $time, $user, $description);
            }
        }

        public function dropReservation($reservationId){
            $this->catalog->dropReservation($reservationId);
        }

        public function modifyReservation($reservationId, $newDescription){
            $this->catalog->modifyReservation($reservationId, $newDescription);
        }

        public function becomeComplete(){
            $this->isComplete=true;
            echo "Session completed";
        }
}

?>