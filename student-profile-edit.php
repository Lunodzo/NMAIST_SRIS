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
    $file_name = rand(1000, 10000)."-".$_FILES['profile']['name'];
    //$new_file_name = $strtolower($file_name);
    $final_name = str_replace(' ', '-', $file_name);
    $file_ext = explode('.', $file_name);
    $file_error = $_FILES['profile']['error'];
    $allowed = array('png', 'jpg', 'jpeg');
    $temp_name = $_FILES['profile']['tmp_name'];

    if($file_error === 0){
        if(isset($file_name) && !empty($file_name)){
            $location = "img/student/";
            if(move_uploaded_file($temp_name, $location.$final_name)){
                $query = "UPDATE student_profile SET picture = '$final_name' WHERE student_id = '$student_id' && email = '$email'";
                mysqli_query($conn, $query);
                header("Location: student-dashboard.php?success");
            }else{
                header("Location: student-dashboard.php?failed");
            }
        }else{
            header("Location: student-dashboard.php?failed");
        }
    }else{
        header("Location: student-dashboard.php?failed");
    }
}else{
    echo "Form didnt work";
}



