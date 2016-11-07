<?php

    Class ReservationSession{
        private $catalog;
        private $isComplete;

        public function __construct(ReservationCatalog $catalog)
        {
            $this->catalog= $catalog;
        }
}

?>