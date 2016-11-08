<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "conference";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=conference", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = CREATE TABLE conference
			(		
			userName varchar(25),
			passWord varchar(25),
			);
		$sql .= SELECT * FROM conference;		
        $conn->exec($sql);
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }

    $conn=null;
?>