<?php

class Connection{

    public $servername = "localhost";
    protected $username = "root";
    protected $password = "";
    public $dbname = "conference";
    protected $result;
    protected $id;
    protected $valid;

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

    public function executeQuery(){
        $this->result=$this->conn->query($this->query);
        $this->id=$this->conn->insert_id;
        if($this->result){
            return true;
        }
        else{
            return false;
        }
    }

    public function close(){
        $this->conn->close();
    }

    public function getID(){
        return $this->id;
    }

    public function getResult(){
        return $this->result;
    }

    public function getData($index){
        if ($this->result->num_rows > 0) {
            // output data
            while($row = $this->result->fetch_assoc()) {
                return $row["$index"];
            }
        }
    }

    public function getValidQuery(){
        return $this->valid;
    }
}



?>