<?php
include 'connection.php';
session_start();
$role = $_SESSION['sess_userrole'];
$email = $_SESSION['sess_email'];

if(!isset($email) || $role!="student"){
    header('Location: index.php?err=2');
}


if(isset($_GET['file'])){
    //$id = $_GET[''];
    $file = $_GET['file'];
    if(unlink("documents/".$file)){
        $query = "DELETE FROM student_document where file = '$file'" or die(mysqli_error());
        if(mysqli_query($conn, $query)){
            header("Location: student-upload-document.php?deleted");
        }else{
            header("Location: student-upload-document.php?deleted_failed");
        }
    }else{
        header("Location: student-upload-document.php?deleted_failed");
    }
}




