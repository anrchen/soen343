<?php
    require_once ("objects/functions/function_login_validation.php");

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

    $errors = array();
    $message = "";
    $goback = false;

    if(isset($_POST['submit'])){
        //Process the form
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        $fields_required = array("username", "password");

        foreach($fields_required as $field){
            $value = trim($_POST[$field]);
            if(!has_presence($value)){
                $errors[$field] = ucfirst($field) . " cannot be blank";
            }
        }

        if(empty($errors)){
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    if ($username == $row["username"] and $password == $row["password"]) {
                        session_start();
                        $_SESSION['login_user'] = $_POST['username'];
                        header('Location: ' . 'booking.php?');
                    }
                    else {
                        $message = "Username and Password do not match";
                    }
                }
            }
        }
    } else {
        $message = "Please Log in";
    }


/*


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

*/
?>



