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

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
//            echo "<br> Username: " . $row["username"] . "<br> Password: " . $row["password"] . "<br>";
            if($_GET['username']==$row["username"] and $_GET['password']==$row["password"]){
                $result=true;
                session_start();
                $_SESSION['login_user']=$_GET['username'];
                header('Location: '.'index.php');
                break;
            }
        }
    }
    $conn->close();

    if($result==false){
        header('Location: '.'login.php?authentification=false');
    }

?>


