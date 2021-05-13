<?php
include 'connection.php';
session_start();
$role = $_SESSION['sess_userrole'];
$email = $_SESSION['sess_email'];
if(!isset($email) || $role!="student"){
    header('Location: index.php?err=2');
}

$sql = "SELECT * FROM student WHERE email = '$email'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);

if(isset($_POST['submit'])){
    $student_id = $row["student_id"];
    $special = $_POST["special"];
    $check_request = "SELECT * FROM room_requests WHERE student_id = '$student_id'";
    $query = mysqli_query($conn, $check_request);

    if(mysqli_num_rows($query)>=1){
        $success = $_SESSION['exists'];
        header("Location: student-hostel.php?exists");
    }else{
        $query = "INSERT INTO `room_requests` (`request_id`, `student_id`, `date_requested`, `special_need`) 
                VALUES (NULL, '$student_id', current_timestamp(), '$special')";
        mysqli_query($conn, $query);
        $success = $_SESSION['success'];
        header("Location: student-hostel.php?success");
    }
}else{
    echo "Failed to submit";
}
