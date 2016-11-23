function validateForm(){
    var reservation = document.forms['modifyReservationForm']['Reservation'].value;
    var description = document.forms['modifyReservationForm']['Description'].value;

    var bool = true;
    var display = "";
    display += "<ul>";

    var reservation = document.forms['modifyReservationForm']['Reservation'].value;
    var description = document.forms['modifyReservationForm']['Description'].value;
    var required_fields = [reservation, description];
    var errors = ["A reservation was not selected", "Description field is empty"];

    for(var i = 0; i < required_fields.length; i++){
        if(required_fields[i] == "" || required_fields[i] == null){
            display += "<li>" + errors[i] + "</li>";
            bool = false;
        }
    }

    display+= "</ul>";
    document.getElementById('display2').innerHTML = display;

    return bool;
}
