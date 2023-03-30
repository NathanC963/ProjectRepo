<?php
session_start();

if (isset($_POST['names']) && isset($_POST['last_names']) && isset($_POST['passwords']) && isset($_POST['emails'])) {
    include 'db_conn.php';
    
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //$_POST['emails'] = '"'.trim($emails,'"').'"';
    //$emails = $_POST['emails'];
    //$emails = "'emails'";
    $emails = validate($_POST['emails']);
    $names = validate($_POST['names']);
    $last_names = validate($_POST['last_names']);
    $passwords = validate($_POST['passwords']);

    if (empty($names) || empty($last_names) || empty($passwords) || empty($emails)){
        header("Location: ../page/seperate-register.html"); 
    } 
    
    
    $sql = "SELECT email FROM register_table WHERE email = '$emails'";
    $query_email = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query_email);
    $finalres = $row["email"];
    if($finalres == $emails) {
       echo "email already in use";
    }
    else {
        $student_id = rand(10000, 99999);
        $_SESSION['student_userid'] = $student_id;
        $hash_p = hash("sha256" , $passwords);
        $hash_p = strval($hash_p);
        $sql = "INSERT INTO register_table(first_name, last_name, password, email, student_id) VALUES('$names', '$last_names', '$hash_p' , '$emails', '$student_id')";
        $res = mysqli_query($conn, $sql);

        if($res) {
            header("Location: ../page/seperate-log.html");
            //echo "you registed succsessfully :)";
            //echo gettype($hash_p);
            //echo "$hash_p";
        }
    }
    
    //$sql = "SELECT email FROM register_table WHERE email = $emails";
    //$res = mysqli_query($conn, $sql);
    
    //if($res == $emails) {
     //  header("Location: homepage.html");
    //} 

}else {
    header("Location: ../page/homepage.html");
}
