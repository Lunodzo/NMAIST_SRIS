<?php
require 'connection.php';
session_start();
$role = $_SESSION['sess_userrole'];
$email = $_SESSION['sess_email'];
if(!isset($email) || $role!="student"){
    header('Location: index.php?err=2');
}

//Fetch student details
$sql = "SELECT * FROM student where email = '$email'";
$sql_results = mysqli_query($conn, $sql); //Execute Query
$row = mysqli_fetch_assoc($sql_results); //Store results

//Create variables to hold values to post in DB
$bill_id = $_POST['bill'];
$student_id = $row['student_id'];
$control_no = rand(111111111, 999999999);
$amount = $_POST['amount'];

$sql_insert = "INSERT INTO `student_bill` (`std_bill_id`, `bill_id`, `student_id`, `control_no`, `amount`, `status`) 
VALUES (NULL, '$bill_id', '$student_id', '$control_no', '$amount', 'pending')";

if(!mysqli_query($conn, $sql_insert)){
    die('Error: ' . mysqli_error($conn));
}else{
    header('Location: student-bills.php?success');
}



