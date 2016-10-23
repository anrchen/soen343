<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "person";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=person", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO SAILORS (sname, rating, age) 
                VALUES ('John', '8', '18')";
        $conn->exec($sql);
        echo "New record created successfully";
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }

    $conn=null;
?>