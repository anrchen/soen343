<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "conference";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        echo 'success';
    }
?>

<?php
    $query = "SELECT * FROM reservation";
    $result = mysqli_query($conn, $query);

    if(!$result){
        die('Database query failed');
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Database</title>
    </head>

    <body>
        <?php
            //Array to store the data captured from the MySQL tables
            $reservation = array();
            $i = 0;

            //Fetches user, room, description, date
            while($row = mysqli_fetch_assoc($result)){
                $timeslot = $row['timeslotID'];
                $user = $row['user'];
                $date = $row['date'];
                $description = $row['description'];
                $room = $row['room'];

                $reservation[$i]["user"] = $user;
                $reservation[$i]["date"] = $date;
                $reservation[$i]["description"] = $description;
                $reservation[$i]["room"] = $room;
                $i++;

            }

            //Fetches the start time and end time

            $query2 = "SELECT StartTime, EndTime FROM Timeslot WHERE id=$timeslot";
            $result2 = mysqli_query($conn, $query2);

            if(!$result){
                die('Database query failed');
            }

            $j = 0;
            while($row = mysqli_fetch_assoc($result2)){
                $start = $row['StartTime'];
                $end = $row['EndTime'];

                $reservation[$j]["start"] = $start;
                $reservation[$j]["end"] = $end;
            }
        ?>
    </body>
</html>
