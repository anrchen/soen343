<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Room Reservation System</title>

		<!-- Custom CSS -->
        <link rel="stylesheet" type="text/css" href="/assets/css/main.css">
        <!--Bootstrap-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!--FontAwesome-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
		
    </head>

    <body style="background-color: #E3E3E3">
        <div id="banner">Booking System</div>

        <?php
            $date = date("Y/m/d");
        ?>

        <div class="container">
            <h3>Availabilities</h3>
            <table style="width:80%">
                <h4><?php echo $date ?></h4>

                <tr>
                    <th></th>
                    <th>7 - 10</th>
                    <th>10 - 13</th>
                    <th>13 - 16</th>
                    <th>16 - 19</th>
                    <th>19 - 22</th>
                </tr>
                <tr>
                    <td>H908</td>
                    <td><?php echo '*'; ?></td>
                </tr>
                <tr>
                    <td>H432</td>
                </tr>
                <tr>
                    <td>H843</td>
                </tr>
                <tr>
                    <td>H123</td>
                </tr>
                <tr>
                    <td>H732</td>
                </tr>
                <tr>
                    <td>H320</td>
                </tr>
            </table style="width:40%">
        </div>
    </body>


    <footer>
        <p>All rights reserved</p>
    </footer>
		

    <!--JQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!--Bootstrap js-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </body>
</html>