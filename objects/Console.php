<?php

include_once 'ReservationCatalog.php';
include_once 'ReservationSession.php';

    Class Console
    {
        private $session;
        private $catalog;

        public function __construct(ReservationCatalog $catalog, ReservationSession $session)
        {
            $this->catalog = $catalog;
            $this->session = $session;
        }

        public function makeNewRoomEntry(Student $student, ReservationCatalog $catalog)
        {
            $this->catalog = $catalog;
            $this->session = new ReservationSession($this->catalog);
            $this->session->initiateRoomEntrySession($student, $catalog);
        }

        public function addRoom($roomNumber, $time, $user, $description){
            $this->session->makeNewRoom($roomNumber, $time, $user, $description);
        }

        public function endRoomEntry(){
            $this->session->becomeComplete();
        }

        public function dropReservation($reservationId){
            $this->session->dropReservation($reservationId);
        }
    }


?>