<?php
require 'connection.php';
session_start();
$role = $_SESSION['sess_userrole'];
if(!isset($_SESSION['sess_email']) || $role != "admin"){
    if(!isset($_SESSION['sess_email']) || $role != "accountant"){
        header('Location: index.php?err=2');
    }
}


//Create variables to hold values to post in DB
$bill_id = $_POST['bill'];
$student_id = $_POST['student'];
$control_no = rand(111111111, 999999999);
$amount = $_POST['amount'];

$sql_insert = "INSERT INTO `student_bill` (`std_bill_id`, `bill_id`, `student_id`, `control_no`, `amount`, `status`) 
VALUES (NULL, '$bill_id', '$student_id', '$control_no', '$amount', 'pending')";

if (!mysqli_query($conn, $sql_insert)) {
    die('Error: ' . mysqli_error($conn));
} else {
    header('Location: accounts.php?success');
}




