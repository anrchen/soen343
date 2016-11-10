<?php

    class TimeSlot{
        private $startTime;
        private $endTime;

        public function __construct($startTime, $endTime)
        {
            $this->startTime = $startTime;
            $this->endTime = $endTime;
        }
    }

?>