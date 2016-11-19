<?php

include_once 'ReservationCatalog.php';
include_once 'ReservationSession.php';
include_once 'RoomCatalog.php';

    Class Console
    {
        private $session;
        private $catalog;
        private $roomCatalog;

        public function __construct(ReservationCatalog $catalog, ReservationSession $session, RoomCatalog $roomCatalog)
        {
            $this->catalog = $catalog;
            $this->session = $session;
            $this->roomCatalog = $roomCatalog;
        }

        public function makeNewRoomEntry(Student $student, ReservationCatalog $catalog)
        {
            $this->catalog = $catalog;
            $this->session = new ReservationSession($this->catalog);
            $this->session->initiateRoomEntrySession($student, $catalog);
        }

        public function addReservation($roomNumber, $time, $user, $description){
//            $room = $this->roomCatalog->getRoom($roomNumber);
            return $this->session->makeNewReservation($roomNumber, $time, $user, $description);
        }

        public function endRoomEntry(){
            $this->session->becomeComplete();
        }

        public function dropReservation($reservationId){
            $this->session->dropReservation($reservationId);
        }

        public function modifyReservation($reservationId, $newDescription){
            $this->session->modifyReservation($reservationId, $newDescription);
        }

        public function getAllRoomNumber(){
            return $this->roomCatalog->getAllRoomNumbers();
        }


    }


?>