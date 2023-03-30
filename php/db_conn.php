<?php

$sname = "localhost";
$uname = "root";
$password = "nate1234";

$db_name = "project_db";

$conn = mysqli_connect($sname, $uname , $password, $db_name);

if (!$conn) {
    echo "Connection Failed!";
    exit();
}