<?php
    echo 'Getting from action<br>Here is POST';
    var_dump($_POST);

// Hard coding for now
$_POST["Room"]='H432';
$_SESSION['login_user']='chen';

    if(isset($_POST["Room"])){
        include_once ('objects/RoomCatalog.php');
        $roomNumber = $_POST["Room"];
        $username = $_SESSION['login_user'];

        $roomCatalog = new RoomCatalog();
        $roomCatalog->unlockRoom($username);
        $roomCatalog->lockRoom($roomNumber,$username);
    }

?>
