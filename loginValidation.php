<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "conference";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT username, password FROM login";
    $result = $conn->query($sql);

    $login = false;
    $missing = false;

        if(!isset($_GET['username']) || !isset($_GET['password'])){
            $missing = true;
        }

        else{

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    if ($_GET['username'] == $row["username"] and $_GET['password'] == $row["password"]) {
                        $login = true;
                        session_start();
                        $_SESSION['login_user'] = $_GET['username'];
                        header('Location: ' . 'booking.php?');
                        break;
                    }
                }
            }
        }
        $conn->close();

    if($missing){
        header('Location: '.'index.php?authentification=missing');
    }
    else{
        if($login==false){
            header('Location: '.'index.php?authentification=false');
        }
    }


?>


