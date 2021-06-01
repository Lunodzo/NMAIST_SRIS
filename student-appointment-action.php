<?php
//PAGE NOT WORKING
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'connection.php';
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

    $reg = $student_exec['student_id'];
    $phone = $student_exec['phone'];
    $nature = mysqli_real_escape_string($conn,$_POST['nature']);
    $hostel = mysqli_real_escape_string($conn,$_POST['hostel']);
    $details = mysqli_real_escape_string($conn, $_POST['details']);

    $check = "SELECT * FROM dean_appointment WHERE email = '$email' AND student_id='$reg' 
                                 AND service_nature = '$nature'";
    $exec = mysqli_query($conn, $check);

    //Check if they exist
    if(1>=5){
        $exists = $_SESSION['exists'];
        header('Location:student-helpdesk.php?exists');
    }else{
        $sql = "INSERT INTO `dean_appointment` (`id`, `student_id`, `service_nature`, `details`, `date_submited`, 
                                `phone`, `email`, `dean_instruction`, `meeting_date`, `meeting_location`, `status`) 
                                VALUES (NULL, '$reg', '$nature', '$details', current_timestamp(), '$phone', '$email', 
                                        NULL, NULL, NULL, 'pending')";

        $results = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        if ($results) {
            $success = $_SESSION['success'];
            header('Location:student-helpdesk.php?success');
            mysqli_close($conn);
        }else{
            echo "Tumekwama";
            //$failed = $_SESSION['failed'];
            //header('Location:student-helpdesk.php?failed');
        }
    }
}
