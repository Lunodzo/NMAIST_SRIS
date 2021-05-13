<?php
if(isset($_POST['submit'])){
    session_start();
    $basic = $_SESSION['basic_next'];
    echo "Its works";
    if(isset($basic)){
        echo "Session set";
    }else{
        echo "Session imebuma";
    }
    //header('Location: student-registration-process.php');
}else{
    echo 'Holaaa mzee';
}
