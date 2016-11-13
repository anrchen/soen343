<?php

class Connection{

    public $servername = "localhost";
    protected $username = "root";
    protected $password = "";
    public $dbname = "conference";

    public $conn;
    protected $query;

    public function __construct()
    {
        // Create connection
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    }

    public function setQuery($query){
        $this->query=$query;
    }

    public function close(){
        $this->conn->close();
    }
}



?>