function validateForm(){
    var start = document.forms["makeReservationForm"]["StartTime"].value;
    var end = document.forms["makeReservationForm"]["EndTime"].value;
    var desc = document.forms["makeReservationForm"]["Description"].value;
    var room = document.forms["makeReservationForm"]["Room"].value;
    var selectedDate = document.forms["makeReservationForm"]["Date"].value;

    var required_fields = [start, end, desc, room, selectedDate];
    var errors = ['StartTime', 'EndTime', 'Description', 'Room', 'Date'];

    var bool = true;
    var display = "<ul>";



    for(var i = 0; i < required_fields.length; i++){
        if(required_fields[i]== null || required_fields[i] == ""){
            display = display + "<li>" + errors[i] + " cannot be blank </li>";
            document.getElementById(errors[i]).style.borderColor = "red";
            bool = false;
        } else {
            document.getElementById(errors[i]).style.borderColor = "green";
        }
    }


    var pattern1 = /^[7,8,9]{1}$/;
    var pattern2 = /^[1]{1}[0-9]{1}$/;
    var pattern3 = /^[2]{1}[0-2]{1}$/;

    var pattern_array = [pattern1, pattern2, pattern3];
    var invalidStart = timePattern(pattern_array, start);
    var invalidEnd = timePattern(pattern_array, end);

    if(invalidStart == false){
        display = display + "<li>Invalid StartTime syntax</li>";
        document.getElementById('StartTime').style.borderColor = "red";
        bool = false;
    }
    if(invalidEnd == false){
        display = display + "<li>Invalid EndTime syntax</li>";
        document.getElementById('EndTime').style.borderColor = "red";
        bool = false;
    }

    display = display + "</ul>";
    document.getElementById('display').innerHTML = display;
    return bool;
}

function timePattern(pattern_array, time){
    var count = 0;
    for(var i = 0; i < pattern_array.length; i++){
        var value = pattern_array[i].test(time);
        if(!value){
            count++;
        }
    }

    if(count === 3){ //if the time does not satisfy either of the 3 patterns
        return false;
    } else {
        return true;
    }

}

