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
                    echo "File moved";
                    $query = "INSERT INTO student_profile (student_id, email, picture) VALUES ('$student_id', '$email', '$final_name')";
                    mysqli_query($conn, $query);
                    $success = $_SESSION['success'];
                    header("Location: student-dashboard.php?success");
                    exit();
                    ?>
                <?php
                }else{
                    echo "Umechema";
                    ?>
<!--                    <script>-->
<!--                        window.location.href='student-dashboard.php?failed';-->
<!--                        //alert('successfully uploaded');-->
<!--                    </script>-->
                    <?php
                }
            }else{
            echo "File name error";
        }
        }else{
            echo "Hola";
            ?>

<!--            <script>-->
<!--                window.location.href='student-dashboard.php?failed';-->
<!--                //alert('successfully uploaded');-->
<!--            </script>-->
            <?php
        }
    }else{
    echo "Form didnt work";
}


