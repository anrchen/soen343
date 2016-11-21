<?php
    session_start();

    if(isset($_GET["room"])){
        include_once ('objects/RoomCatalog.php');
        $roomNumber = $_GET["room"];
        $username = $_SESSION['login_user'];

        $roomCatalog = new RoomCatalog();
        $roomCatalog->unlockRoom($username);
        $roomCatalog->lockRoom($roomNumber,$username);
    }

?>
