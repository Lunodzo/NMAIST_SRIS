<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


include 'connection.php';
session_start();
$role = $_SESSION['sess_userrole'];
$email = $_SESSION['sess_email'];
if(!isset($email) || $role!="student"){
    header('Location: index.php?err=2');
}

if(isset($_POST['submit'])){
    $student_query = "SELECT * FROM student WHERE email = '$email'";
    $student_run = mysqli_query($conn, $student_query);
    $student_exec = mysqli_fetch_assoc($student_run);

    //Read form inputs and sanitize
    $department = mysqli_real_escape_string($conn,$_POST['department']);
    $location = mysqli_real_escape_string($conn,$_POST['location']);
    $desc = mysqli_real_escape_string($conn, $_POST['description']);
    $student_id = $student_exec['student_id'];
    $phone = $student_exec['phone'];


//    $check = "SELECT * FROM student_service WHERE email = '$email' AND student_id=".$student_id."
//                                 AND department = '$department'";
//    $exec = mysqli_query($conn, $check);
//    $count = mysqli_num_rows($exec);

    //Check if they exist
    //Checking did not work, so we have commented it
    if(1>=5){
        $exists = $_SESSION['exists_service'];
        header('Location:student-helpdesk.php?exists');
    }else{
        $sql = "INSERT INTO `student_service` (`student_id`, `phone`, `email`, `department`, `location`, `description`) 
                VALUES ('$student_id', '$phone', '$email', '$department', '$location', '$desc')";

        if (mysqli_query($conn, $sql)) {
            $success = $_SESSION['success_service'];
            header('Location:student-helpdesk.php?success');
            mysqli_close($conn);
        }else{
            $failed = $_SESSION['failed_service'];
            header('Location:student-helpdesk.php?failed');
        }
    }
}

