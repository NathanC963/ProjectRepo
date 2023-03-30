<?php
session_start();
//echo phpinfo();

if (isset($_POST['passwords']) && isset($_POST['emails'])) {
    include 'db_conn.php';

    $emails = ($_POST['emails']);
    $passwords = ($_POST['passwords']);

    if (empty($passwords) || empty($emails)){
    header("Location: ../page/seperate-log.html"); 
} 
$passwords = hash("sha256" , $passwords);
$sql = "SELECT * FROM register_table WHERE password = '$passwords'";
$mysql_q = mysqli_query($conn, $sql);
//$res = $mysql_q->reap_async_query();
$row = mysqli_fetch_array($mysql_q);
$finalres = $row["password"];

$sql_email = "SELECT * FROM register_table WHERE email = '$emails'";
$mysql_email = mysqli_query($conn, $sql_email); 
$row_email = mysqli_fetch_array($mysql_email);
$emailres = $row_email["email"];
$id = $row_email['student_id'];
$_SESSION['student_userid'] = $id;
$_SESSION['student_email'] = $emailres;

if ($finalres == $passwords && $emailres == $emails){
    header("Location: ../page/booking.html");
} else {
    echo "Invalid credentials.";
    //echo "$passwords";
    //echo gettype($res);
    //$row = mysqli_fetch_array($mysql_q);
    //echo print_r($row["password"]);
    //echo "\n";

    //$array = (array) $res;
    //echo var_dump($array);
    //echo $mysql_q;
    //echo print_r($res);

}
//4e82ffc2e78c1002365b85720d90cd908ad8b5e2fd11a6f9d539ab9105d8c82d
//4e82ffc2e78c1002365b85720d90cd908ad8b5e2fd11a6f9d539ab9105d8c82d
}