<?php
require 'connection.php';
if(isset($_GET['room_id'])){
    $room_id = $_GET['room_id'];
    $sql = "UPDATE `room` SET `status` = 'Not Okay' WHERE `room_id` = ".$room_id;
    //$sql = "UPDATE `room` SET `status` = 'Not Okay' WHERE `room`.`room_id` = 2";

    if(!mysqli_query($conn, $sql)){
        die('Error: ' . mysqli_error($conn));
    }else{
        header('Location: hostel-status.php?success1');
    }
}


