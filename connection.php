<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "connection";

    $connection = mysqli_connect($servername, $username, $password, $dbname);

    //Testing connection
    if(mysqli_connect_errno()){
        die("Database connection failed: " .
            mysqli_connect_error() .
            " (" . mysqli_connect_errno() .")"
        );
    }
?>

