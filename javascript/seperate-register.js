function homepage_clicked(){
    document.location.href="../page/homepage.html"
}

function log_in_clicked(){
    document.location.href="../page/seperate-log.html"
}

function password_checker(){
    var password = document.getElementById("password").value;

    if (password == ""){
        document.getElementById("message").style.color = "red";
        document.getElementById("message").innerHTML = "*please enter a password*";
        return false;
    }

    if (password.length < 5){
        document.getElementById("message").style.color = "red";
        document.getElementById("message").innerHTML = "*password must be at least 5 characters long*";
        return false;
    }

    if (password.length > 10){
        document.getElementById("message").style.color = "red";
        document.getElementById("message").innerHTML = "*password must be less than 10 character";
        return false;
    } 
    
    if (password.search(/[a-z]/i) < 0) {
        document.getElementById("message").style.color = "red";
        document.getElementById("message").innerHTML = ("Your password must contain at least one letter.");
        return false;
    }
    
    if (password.search(/[0-9]/) < 0) {
        document.getElementById("message").style.color = "red";
        document.getElementById("message").innerHTML = ("Your password must contain at least one digit."); 
        return false;
    } else {
        document.getElementById("message").style.color = "green";
        document.getElementById("message").innerHTML = ("password is correct");
        return true;
    }
}

function name_checker(){
    var name = document.getElementById("name").value;
    
    if (name == ""){
        document.getElementById("name_message").style.color = "red";
        document.getElementById("name_message").innerHTML = "*please enter a name*";
        return false;
    }

    if (name.length < 3){
        document.getElementById("name_message").style.color = "red";
        document.getElementById("name_message").innerHTML = "*name must be at least 3 characters long*";
        return false;
    }

    if(name.length > 12){
        document.getElementById("name_message").style.color = "red";
        document.getElementById("name_message").innerHTML = "*name must be less than 12 characters long*";
        return false;
    }

    if (name.search(/[0-9]/) > 0){
        document.getElementById("name_message").style.color = "red";
        document.getElementById("name_message").innerHTML = "*name cannot have a number*";
        return false;
    } 
    
    if (name.search(/\s/) > 0){
        document.getElementById("name_message").style.color = "red";
        document.getElementById("name_message").innerHTML = "*name cannot have a space*";
        return false;
    } else {
        document.getElementById("name_message").style.color = "green";
        document.getElementById("name_message").innerHTML = "name is correct";
        return true;
    }
}

function last_name_checker(){
    var last_name = document.getElementById("last_name").value;
    
    if (last_name == ""){
        document.getElementById("last_name_message").style.color = "red";
        document.getElementById("last_name_message").innerHTML = "*please enter a last name*";
        return false;
    }

    if (last_name.length < 3){
        document.getElementById("last_name_message").style.color = "red";
        document.getElementById("last_name_message").innerHTML = "*last name must be at least 3 characters long*";
        return false;
    }

    if(last_name.length > 12){
        document.getElementById("last_name_message").style.color = "red";
        document.getElementById("last_name_message").innerHTML = "*last name must be less than 12 characters long*";
        return false;
    }

    if (last_name.search(/[0-9]/) > 0){
        document.getElementById("last_name_message").style.color = "red";
        document.getElementById("last_name_message").innerHTML = "*last name cannot have a number*";
        return false;
    } 
    
    if (last_name.search(/\s/) > 0){
        document.getElementById("last_name_message").style.color = "red";
        document.getElementById("last_name_message").innerHTML = "*last name cannot have a space*";
        return false;
    }
    else {
        document.getElementById("last_name_message").style.color = "green";
        document.getElementById("last_name_message").innerHTML = "last name is correct";
        return true;
    }
}
