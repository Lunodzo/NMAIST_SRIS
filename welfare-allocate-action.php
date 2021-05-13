<?php
require 'connection.php';
if(isset($_GET['request'])){
    //Fetch current academic year
    $sql_registration = "SELECT reg_session_id FROM registration_session";
    $query_reg = mysqli_query($conn, $sql_registration);
    $row_reg = mysqli_fetch_assoc($query_reg);


    $request = $_GET['request'];
    $room_no = $_POST['room'];
    $reg_session = $row_reg['reg_session_id'];

    $sql_detail = "SELECT * from room_requests, student WHERE student.student_id = room_requests.student_id AND request_id =".$request;
    if(mysqli_query($conn, $sql_detail)){
        $exec = "INSERT INTO `room_allocation` (`id`, `room_id`, `request_id`, `reg_session_id`, `date_allocated`, `expire_date`) 
                VALUES (NULL, $room_no, '$request', '$reg_session', current_timestamp(), NULL);";

        $query = mysqli_query($conn, $exec);
        if(!mysqli_query($conn, $exec)){
            die('Error: ' . mysqli_error($conn));
        }else{
            header('Location: welfare-allocate-hostel.php?success1');
        }
    }
}
