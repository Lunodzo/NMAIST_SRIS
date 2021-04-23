<?php
if(isset($_POST['submit'])){
    session_start();
    $basic = $_SESSION['basic_next'];
    header('Location: student-registration-process.php');
}else{
    echo 'Holaaa mzee';
}
