<?php
    session_start();

    include_once ('objects/Console.php');
    include_once ('objects/WaitList.php');
    include_once ('objects/Student.php');

    $user = $_SESSION['login_user'];


    $roomCatalog = new RoomCatalog();
    $waitList = new WaitList();
    $student = new Student ($user);
    $console = new Console($roomCatalog, $waitList);

    $console->setStudent($student);
    $numberOfReserves=$console->getUserNumberReservations();

    if($numberOfReserves>=5){
        echo "<script>
                    alert('You can not reserve more than five reservations');
                    window.location.href='booking.php';
              </script>";
    }else{
        header('Location: make_reservation.php');
    }
?>