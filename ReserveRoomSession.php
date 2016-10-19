<?php
    class ReserveRoomSession{

        private $student;
        private $isComplete;

        public function __construct(Student $student)
        {
            $this->student = $student;
        }

        public function makeNewRoom($roomNumber, $time){

        }

        public function becomeComplete(){
            $isComplete = true;
        }
    }

?>