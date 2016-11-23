<?php
	//Establishing Connection
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "conference";
	
	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	
	//Testing connection
	if(mysqli_connect_errno()){
		die("Database connection failed: " .
			mysqli_connect_error() .
			" (" . mysqli_connect_errno() .")"
		);
	}
?>

<?php
	//Perform database query
	$query = "SELECT * FROM reservation ORDER BY id DESC LIMIT 0, 1"; 
	
	$result = mysqli_query($connection, $query);
	if(!$result){
		die("Database query failed");
	}
?>

<?php
	while($row = mysqli_fetch_assoc($result)){
		var_dump($row);
		$id = $row['id'];
	}
	
?>

<?php 
	echo $id;	
	
	//Perform database query 2
	$query = "DELETE FROM `reservation` WHERE id='$id'";
	
	$result = mysqli_query($connection, $query);
	if(!$result){
		die("Database query failed");
	} else { 
		echo 'success';
	}
	
	$connection->close();
	session_start();
	include_once('objects/RoomCatalog.php');
    $roomCatalog = new RoomCatalog();
    $roomCatalog->unlockRoom($_SESSION['login_user']);
	
	header('Location: booking.php');
?>