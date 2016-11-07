<?php

    class Student{

        private $username;
        private $password;

        public function __construct($username, $password)
        {
            $this->username = $username;
            $this->password = $password;
        }
    }

?>