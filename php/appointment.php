<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require "../vendor/autoload.php";

$student_userid  = $_SESSION['student_userid'];
$student_email = $_SESSION['student_email'];
//echo $student_userid;
echo $student_email;

if (isset($_POST['dates']) && isset($_POST['times'])) {
    include 'db_conn.php';


    $dates = ($_POST['dates']);
    $times = ($_POST['times']);


    if (empty($dates) || empty($times)){
        header("Location: ../page/booking.html"); 
    } 
}
$subject = "appointment";
$msg = "you have booked your appointment successfully";
$headers = array(
    'X-Mailer' => 'PHP/' . phpversion(),
    'From' => "nathan@tylerw.co.uk",
    "ctladdr" => "nathan@tylerw.co.uk"
);

    
    //global $student_id;
    //echo $student_id;
    //$student_id = "11111";
   $sql = "INSERT INTO appointment_tables(student_id, date_user, time_user) VALUES('$student_userid', '$dates' , '$times')";
   $res = mysqli_query($conn, $sql);

   if($res) {
        // $result = mail($student_email, $subject, $msg, $headers);
        // var_dump($result);
        // echo $result;

        $mail = new PHPMailer(true);
        try {
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'nathanwork1233@gmail.com';
            $mail->Password = 'NathanLclarke1';

            $mail->setFrom("nathanwork1233@gmail.com");
            $mail->addAddress($student_email);
            $mail->isHTML(false);
            $mail->Subject = $subject;
            $mail->Body = $msg;

            $mail->send();

            // set up smtp in gmail:
            // enable 2fa and get app password for authentication

            echo 'you booked your appointment successfully';
        } catch (Exception $e) {
           echo "{$mail->ErrorInfo}";
        }
        
        // if (mail($student_email, $subject, $msg, $headers)){
        //     echo 'you booked your appointment successfully';
        // } else {
        //     echo 'email did not send';
        // }
   } else {
   echo "Invalid credentials.";
}




