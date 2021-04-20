<?php
require 'connection.php';
session_start();
$role = $_SESSION['sess_userrole'];
$email = $_SESSION['sess_email'];
if(!isset($email) || $role!="student"){
    header('Location: index.php?err=2');
}

if(isset($_POST['submit'])){
    $reg = mysqli_real_escape_string($conn, $_POST['reg-no']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $nature = mysqli_real_escape_string($conn,$_POST['nature']);
    $hostel = mysqli_real_escape_string($conn,$_POST['hostel']);
    $details = mysqli_real_escape_string($conn, $_POST['details']);

    $check = "SELECT * FROM dean_appointment WHERE email = '$email' AND student_id='$reg' 
                                 AND service_nature = '$nature'";
    $exec = mysqli_query($conn, $check);

    //Check if they exist
    if(mysqli_num_rows($exec)>=1){
        $exists = $_SESSION['exists'];
        header('Location:student-helpdesk.php?exists');
    }else{
        $sql = "INSERT INTO `dean_appointment` (`student_id`, `service_nature`, `details`, `date_submited`, `phone`, `email`) 
                VALUES ('$reg', '$nature', '$details', current_timestamp(), '$phone', '$email')";

        if (mysqli_query($conn, $sql)) {
            $success = $_SESSION['success'];
            header('Location:student-helpdesk.php?success');
            mysqli_close($conn);
        }else{
            $failed = $_SESSION['failed'];
            header('Location:student-helpdesk.php?failed');
        }
    }
}
