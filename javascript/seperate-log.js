function homepage_clicked(){
    document.location.href="../page/homepage.html"
}
function register_clicked(){
    document.location.href="../page/seperate-register.html"
}

function hash_password(){
    var passwords = document.getElementsByName("passwords").value;

    passwords = hash("sha256" , passwords);
    document.getElementsByName("passwords").innerHTML = passwords
}




