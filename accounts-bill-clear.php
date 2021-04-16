<?php
require 'connection.php';
if(isset($_GET['bill-id'])){
    $bill_id = $_GET['bill-id'];
    $sql = "UPDATE `student_bill_view` SET `status` = 'paid' WHERE `student_bill_view`.`control_no` = ".$bill_id;

    if(!mysqli_query($conn, $sql)){
        die('Error: ' . mysqli_error($conn));
    }else{
        header('Location: accounts.php?success1');
    }
}

