<?php
session_start();
require "connection.php";
$email = $_SESSION['sess_email'];
$role = $_SESSION['sess_userrole'];
if(!isset($_SESSION['sess_email']) || $role != "admin"){
    if(!isset($_SESSION['sess_email']) || $role != "admission"){
        header('Location: index.php?err=2');
    }
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$sql = "SELECT * FROM student WHERE email = '$email'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);

if(isset($_POST['submit'])){
    $f_name = $row["FirstName"];
    $m_name = $_POST["MiddleName"];
    $l_name = $_POST["LastName"];
    $gender = $_POST["sex"];
    $marriage = $_POST["marriage"];
    $reg_no = $_POST["RegNumber"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $dob = $_POST["dob"];
    $nationality = $_POST["nationality"];
    $course = $_POST["course"];
    $cohort = $_POST["cohort"];
    $sponsor = $_POST["sponsor"];
    $study_type = $_POST["study_type"];

    $query = "INSERT INTO `student` (`student_id`, `f_name`, `m_name`, `l_name`, `sex`, `phone`, `email`, 
                       `dob`, `marital_status`, `address`, `nationality`, `course_id`, 
                       `cohort`, `study_type`, `system_level`, `sponsor_id`, `password`, `status`) 
                       VALUES ('$reg_no', '$f_name', '$m_name', '$l_name', '$gender', '$phone', '$email', '$dob', 
                               '$marriage', '$address','$nationality', '$course', '$cohort', 
                               '$study_type', 'student', '$sponsor', '', 'Active');";

    $results = mysqli_query($conn, $query)or die(mysqli_error($conn));
    if(!$results){
        echo "Imefeli";
    }else{
        $success = $_SESSION['success'];
        header("Location: student-registration.php?success");
    }
}else{
    echo "Failed to submit";
}
