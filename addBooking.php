<?php
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "booking";

    $dbC= mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

    //Testing connection
    if(mysqli_connect_errno()){
        die("Database connection failed: " .
            mysqli_connect_error() .
            " (" . mysqli_connect_errno() .")"
        );
    }
?>

<?php
    $room_get = $_GET['room'];
    $time_get = $_GET['time'];
    $date_get = $_GET['date'];

    $date = (string) $date_get; //Convert the GET value into a string, to allow conditioning in query

    $query = "SELECT * FROM reservation WHERE date = '" . $date_get . "'";
    $result = mysqli_query($dbC, $query);

    if(!$result){
        die("Database query failed");
    }

    while($row = mysqli_fetch_assoc($result)){
        echo $row['room'];
    }

?>
