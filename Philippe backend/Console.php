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

        //this is how I would do it
        /*
        private $ReservationSession;

        public function_contruct(ReservationSession $reservationsession)
        {
            $this->ReservationSession = $reservationsession;
        }

        public function AddReservation()
        {
            //get the room number, start time, end time and student object from the front-end (that the user has selected)

            //call the function AddReservation(int roomNumber, Time startTime, Time endTime, Student student) from the $ReservationSession object with the info gathered
        }

        public function RemoveReservation()
        {
            //same as AddReservation() but call RemoveReservation(int roomNumber, Time startTime, Time endTime, Student student) function
        }

        public function ModifyReservation()
        {
            //same as AddReservation() but call ModifyReservation(int roomNumber, Time startTime, Time endTime, Student student) function
        }

        public function ViewReservation()
        {
            //simply call ViewReservation() function of $ReservationSession object, no need to gather any info
        }
        */
    }


?>