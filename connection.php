<?php

class Connection{

    public $servername = "localhost";
    protected $username = "root";
    protected $password = "";
    public $dbname = "conference";
    protected $id;

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

    public function insertQuery(){
        $this->conn->query($this->query);
        $this->id=$this->conn->insert_id;
        echo "Data successfully inserted";
    }

    public function close(){
        $this->conn->close();
    }

    public function getID(){
        return $this->id;
    }

}



?>