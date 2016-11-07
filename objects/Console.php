<?php

include_once '../objects/ReservationCatalog.php';
include_once '../objects/ReservationSession.php';

    Class Console
    {
        private $session;
        private $catalog;

        public function __construct(ReservationCatalog $catalog, ReservationSession $session)
        {
            $this->catalog = $catalog;
            $this->session = $session;
        }

        public function makeNewRoomEntry()
        {
            $this->session = new ReservationSession($this->catalog);
            $this->session->initiateRoomEntrySession();
        }

        public function addRoom($roomNumber, $time, $user){
            $this->session->makeNewRoom($roomNumber, $time, $user);
        }

        public function endRoomEntry(){
            $this->session->becomeComplete();
        }
    }


?>