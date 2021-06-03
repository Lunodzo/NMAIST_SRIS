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

    <title>SRIS - Documents list</title>

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
            <?php include 'top-bar.php'; ?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Student's Documents List</h1>

                <!-- Student Bills (Individual) -->
                <div class="card shadow mb-4">
                    <div class="card-header py-6">
                        <div class="row">
                            <div class="col-md-10 m-0 font-weight-bold text-primary">
                                <h4>Document List</h4>
                                <div class="font-weight-bold text-success">
                                    <?php
                                    if(isset($_GET['success'])){
                                        $_SESSION['message'] = 'Your document has been upload';
                                        $message = $_SESSION['message'];
                                        echo $message;
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-2 m-0 float-right">
<!--                                <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#billForm">Upload</button>-->
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Document</th>
                                    <th>File Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php
                                if(isset($_GET['id'])){
                                    $student_id = $_GET['id'];
                                }
                                $sql = "select file, email, student_document.student_id, document_type from student, student_document, 
                                                              document_type WHERE student.student_id = student_document.student_id AND 
                                                                                  document_type.document_type_id = student_document.document_type_id
                                                                                  AND student_document.student_id = '$student_id'";
                                if ($sql_results = mysqli_query($conn, $sql)){
                                    while($row = mysqli_fetch_assoc($sql_results)){
                                        echo "<tr>";
                                        echo "<td>".$row['document_type']." </td>";
                                        echo "<td>".$row['file']."</td>";
                                        echo "<td><button class='btn btn-success btn-sm btn-block'> Verify </button></td>";
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
        <?php include 'footer.php'; ?>
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
