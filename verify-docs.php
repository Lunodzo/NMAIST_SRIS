<?php
session_start();
$role = $_SESSION['sess_userrole'];
$email = $_SESSION['sess_email'];
if(!isset($_SESSION['sess_email']) || $role != "admin"){
    if(!isset($_SESSION['sess_email']) || $role != "admission"){
        header('Location: index.php?err=2');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SRIS - Documents Verification</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        if($role == "admission"){
            require 'navigation-admissions.php';
        }else{
            require 'navigation.php';
        }
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php require 'top-bar.php' ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Documents verification</h1>
                    <p class="mb-4">You have landed into Documents Verification page, If you think this is a mistake <a target="_blank"
                            href="#">Try menu list on the left</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Students' Documents</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Names</th>
                                            <th>Programme</th>
                                            <th>Gender</th>
                                            <th>Sponsor</th>
                                            <th>Documents</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sql = "SELECT student_id, f_name, l_name, course_short_form, name, phone, sex FROM student, course, sponsor 
                                        where student.course_id = course.course_id AND student.sponsor_id = sponsor.sponsor_id";

                                    if($student_results = mysqli_query($conn, $sql)){
                                        while ($row = mysqli_fetch_assoc($student_results)) {
                                            $id = $row['student_id'];
                                            echo "<tr>";
                                            echo "<td>".$row['f_name']."&nbsp".$row['l_name']." </td>";
                                            echo "<td>".$row['course_short_form']." </td>";
                                            echo "<td>".$row['sex']." </td>";
                                            echo "<td>".$row['name']." </td>";

                                            $sql_one = "SELECT * FROM `uploaded_docs` where student_id = '$id'";
                                            $query = mysqli_query($conn, $sql_one);
                                            $count = mysqli_num_rows($query);
                                            //echo $count;

                                            if($count>=1){
                                                echo "<td><badge class='alert-primary'>Uploaded</badge> </td>";
                                            }else{
                                                echo "<td><badge class='alert-primary'>Not Uploaded</badge> </td>";
                                            }
                                            echo "<td><a class='btn btn-success btn-sm btn-block' href='student-document-list.php?id=".$row['student_id']."'> View</td>";
                                            echo "</tr>";
                                        }
                                    }

                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php require 'footer.php'; ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php include 'logout-modal.php'; ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>