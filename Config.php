<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "conference";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=account", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = CREATE TABLE account
			(		
			);
		$sql .= SELECT * FROM account;		
        $conn->exec($sql);
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }

    $conn=null;
?>