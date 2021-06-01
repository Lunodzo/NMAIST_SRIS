<?php
session_start();
require "connection.php";
$email = $_SESSION['sess_email'];
$role = $_SESSION['sess_userrole'];
if(!isset($_SESSION['sess_email']) || $role != "admin"){
    if(!isset($_SESSION['sess_email']) || $role != "student"){
        if(!isset($_SESSION['sess_email']) || $role != "admission"){
            header('Location: index.php?err=2');
        }
    }
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$sql = "SELECT * FROM student WHERE email = '$email'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);

if(isset($_POST['submit'])){
    $student_id = $row["student_id"];
    $company = $_POST["company"];
    $date_created = $_POST["date"];
    $period = $_POST["period"];
    $package = $_POST["package"];
    $other = $_POST["other"];

    $query = "INSERT INTO `student_insurance` (`id`, `student_id`, `company`, `date_created`, `period`, `package`, `status`, `other_details`) 
                VALUES (NULL, '$student_id', '$company', '$date_created', $period, '$package', 'active', '$other');";

    $results = mysqli_query($conn, $query)or die(mysqli_error($conn));
    if(!$results){
        echo "Imefeli";
    }else{
        $success = $_SESSION['success'];
        header("Location: student-add-insurance.php?success");
    }
}else{
    echo "Failed to submit";
}
