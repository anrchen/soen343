function validateForm(){
    var reservation = document.forms['dropReservationForm']['Reservation'].value;
    var display = "";
    var bool = true;

    display = "Fix the following error:";
    display += "<ul>";
    if(reservation == null || reservation == ""){
        display += "<li>Select a room</li>";
        var bool = false;
    }
    display += "</ul>";

    document.getElementById('display2').innerHTML = display;
    return bool;
}