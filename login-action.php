<?php

//include 'connection.php';
//Get error messages
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = mysqli_connect("localhost","root","","nmaist_sris");

session_start();

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, SHA1($_POST['password']));
$firstName = "";
$lastName = "";

$q = 'SELECT * FROM authentication_view WHERE email="'.$email.'" and password = "'.$password.'"';

$query = mysqli_query($conn, $q);

if(mysqli_num_rows($query) > 0){
    if ($row = mysqli_fetch_assoc($query)){
        session_regenerate_id();
        $_SESSION['sess_email'] = $row['email'];
        $_SESSION['sess_name'] = $row['f_name']."&nbsp".$row['l_name'];
        $_SESSION['sess_userrole'] = $row['system_level'];

        echo $_SESSION['sess_userrole'];
        session_write_close();

        if( $_SESSION['sess_userrole'] == "admin"){
            header('Location: admi_dashboard.php');
        }else if($_SESSION['sess_userrole'] == "accountant"){
            header('Location: accounts.php');
        }else if($_SESSION['sess_userrole'] == "student"){
            header('Location: student-dashboard.php');

        }else if($_SESSION['sess_userrole'] == "admission") {
            header('Location: admissions.php');

        }else if ($_SESSION['sess_userrole'] == "welfare"){
            header('Location: welfare-dashboard.php');
        }else{
            header('Location: 404.php');
        }
    }
}
else{
    header('Location: index.php?err=1');
}

