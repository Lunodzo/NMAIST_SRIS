<?php
include 'connection.php';
session_start();
$role = $_SESSION['sess_userrole'];
$email = $_SESSION['sess_email'];
if(!isset($email) || $role!="student"){
    header('Location: index.php?err=2');
}


if(isset($_POST['submit'])){
    $student_id = $_POST['student'];
    $doc_type = $_POST['doc-type'];
    $file_name = rand(1000,100000)."-".$_FILES['file']['name'];
    $new_file_name = strtolower($file_name);
    $final_file=str_replace(' ','-',$new_file_name);
    $temp_name = $_FILES['file']['tmp_name'];

    $file_ext   = explode('.', $file_name);
    $file_fname = explode('.', $file_name);
    $file_size  = $_FILES['file']['size'];
    $file_error = $_FILES['file']['error'];
    $allowed    = array('pdf','doc');

    if($file_error === 0){
        if(isset($file_name) and !empty($file_name)){
            $location="documents/";
            //$root = getcwd();
            if(move_uploaded_file($temp_name,$location.$final_file)){
                echo "Uploaded";
                $sql="INSERT INTO student_document(student_id,document_type_id,file) VALUES('$student_id','$doc_type','$final_file')";
                mysqli_query($conn, $sql);
                ?>
                <script>
                    window.location.href='student-nhif.php?success';
                    //alert('successfully uploaded');
                </script>
                <?php

            }else{
                ?>
                <script>
                    //alert('Failed');
                    window.location.href='student-nhif.php?failed';
                </script>
                <?php
            }
        }else{
            ?>
            <script>
                //alert('No file');
                window.location.href='student-nhif.php?none';
            </script>
            <?php
        }
    }else{
        ?>
        <script>
            //alert('There is a problem with file');
            window.location.href='student-nhif.php?problem';
        </script>
        <?php
    }
}else{
    echo "Totally OUT";
}


