<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>
    <body>
        <div id="banner"></div>
        <div id="header" class="header"></div>
        <div class="booking">
            <div class="option">
<!--                <ul id="navigation" class="optionNavigation">-->
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
        </div>

        <footer>
            <p>All rights reserved</p>
        </footer>
    </body>
</html>