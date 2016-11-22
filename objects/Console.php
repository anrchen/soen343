<?php

include_once 'ReservationCatalog.php';
include_once 'ReservationSession.php';
include_once 'RoomCatalog.php';
include_once 'WaitList.php';

    Class Console
    {
        private $session;
        private $roomCatalog;
        private $waitList;

        public function __construct(RoomCatalog $roomCatalog, WaitList $waitList)
        {
			$this->roomCatalog = $roomCatalog;
			$this->waitList = $waitList;
        }

        public function addReservation($roomNumber, $time, $user, $description){
            return $this->session->makeNewReservation($roomNumber, $time, $user, $description);
        }

        public function initiateReservationSession(ReservationCatalog $catalog){
            $this->session = new ReservationSession($catalog);
        }

        public function endReservationSession(){
            $this->session->becomeComplete();
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

        public function addReservationToWaitList($reservation){
            $this->waitList->addReservation($reservation);
        }

        public function updateWaitList(){
            $this->waitList->updateDB();
        }

        public function proceedNextReservation($reservationID){
            $this->waitList->proceedNextReservation($reservationID);
        }

        public function removeUserSameTimeslot($reservationID){
            $this->waitList->removeUserSameTimeslot($reservationID);
        }
		
				
		public function updateCatalogByUser($user){
			$this->session = updateCatalogByUser($user);
		}

    }


?>