<?php

    Class ReservationSession{
        private $catalog;
        private $isComplete;

        public function __construct(ReservationCatalog $catalog)
        {
            $this->catalog= $catalog;
        }

        public function initiateReservationSession(){
            $this->isComplete = false;
        }

        public function makeNewReservation($roomNumber, $time, $user, $description){
            if($this->isComplete){
                echo "Room entry session wasn't initialized...";
            } else{
                return $this->catalog->makeNewReservation($roomNumber, $time, $user, $description);
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
        }
}

?>