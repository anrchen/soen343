function validateForm(){
    var username = document.forms['login_form']['input_username'];
    var password = document.forms['login_form']['input_password'];

    var required_fields = [username, password];
    var errors = ['username', 'password'];

    var bool = true;
    var error = "";

    for(var i = 0; i < required_fields.length; i++){
        if( required_fields[i] == null || required_fields == ""){
            var error = error + "- " + errors[i] + " is empty" + "<br/>";
            document.getElementById(errors[i]).style.borderColor = "red";
            bool = false;
        } else {
            document.getElementById(errors[i]).style.borderColor = "green";
        }
    }

    document.getElementById('errorDisplay').innerHTML = error;

    return bool;
}
