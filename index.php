<!DOCTYPE html>
<html>
    <head>
		<!-- Custom CSS -->
        <link rel="stylesheet" type="text/css" href="/assets/css/main.css">
		
        <!--Bootstrap-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		
    </head>
    <body>
        <div id="banner">Booking System</div>
<!--          <div class="booking">
            <div class="option">
              <ul id="navigation" class="optionNavigation">-->
<!--                    <li>-->
<!--                        <a id="bookRoom"></a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a id="searchRoomAvailability"></a>-->
<!--                    </li>-->
<!--                </ul>-->
			
                <div id="bookingEngine" class="bookingEngine">
                    <form id="bookRoomForm" autocomplete="false">
                        <div class="bookRoomDetail">
                            <div class="bookContent">
								<p>Enter the desired room, time slot, and date</p>
                                <ul style="list-style: none">
                                    <li class="selectRoom">
                                        <input id="room" class="requiredField" name="room" placeholder="Select Room"
                                               autocomplete="false">
                                    </li>
                                    <li class="selectDate">
                                        <input id="date" class="requiredField" name="date" placeholder="Select Date"
                                               autocomplete="false">
                                    </li>
                                    <li class="selectTime">
                                        <input id="time" class="requiredField" name="time" placeholder="Select Time"
                                               autocomplete="false">
                                    </li>
                                </ul>
                            </div>
                            <div class="search_icon">
                                <input id="search_room" value="Search" type="submit">
                            </div>
                        </div>
                    </form>
                </div>
            
        </div>

        <footer>
            <p>All rights reserved</p>
        </footer>
		

		<!--JQuery-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!--Bootstrap js-->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>		

    </body>
</html>