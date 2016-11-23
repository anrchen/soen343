<?php

    class TimeSlot{
        private $startTime;
        private $endTime;
        private $date;

        public function __construct($startTime, $endTime, $date)
        {
            $this->startTime = $startTime;
            $this->endTime = $endTime;
            $this->date = $date;
        }

        public function getStart(){
            return $this->startTime;
        }

        public function getEnd(){
            return $this->endTime;
        }

        public function getDate(){
            return $this->date;
        }
    }

?>