<?php

include_once 'Catalog.php';

    Class Console
    {

        private $session;
        private $catalog;

        public function __construct(Catalog $catalog, ReserveRoomSession $session)
        {
            $this->catalog = $catalog;
            $this->session = $session;
        }

        public function makeNewRoomEntry()
        {
            $this->session = new ReserveRoomSession($this->catalog);
        }

        public function addRoom($roomNumber, $time){
            $this->session->makeNewRoom($roomNumber, $time);
        }

        public function endRoomEntry(){
            $this->session->becomeComplete();
        }
    }


?>