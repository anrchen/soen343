function validateForm(){
    var reservation = document.forms['dropReservationForm']['Reservation'].value;
    var display = "";
    var bool = true;


    if(reservation == null || reservation == ""){
        display += "<ul>";
        display += "<li>Select a room</li>";
        var bool = false;
    }
    display += "</ul>";

    document.getElementById('display2').innerHTML = display;
    return bool;
}