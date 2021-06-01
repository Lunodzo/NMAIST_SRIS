<?php
include 'connection.php';
session_start();
$role = $_SESSION['sess_userrole'];
$email = $_SESSION['sess_email'];
if(!isset($email) || $role!="student"){
    header('Location: index.php?err=2');
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

    <title>SRIS - Add Insurance Details</title>

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
    <?php include 'navigation-student.php'; ?>
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
                <h1 class="h3 mb-4 text-gray-800">Add Insurance Details</h1>
                <div class="card shadow mb-4 card-header-actions">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10 m-0 font-weight-bold text-primary">
                                Insurance Details
                            </div>
                            <div class="col-md-2 m-0 float-right">
                            </div>
                        </div>
                        <?php
                        if (isset($_GET['success'])){?>
                            <div class="alert-success">
                                <p>Data added</p>
                            </div>
                            <?php
                            unset($_SESSION['success']);}
                        ?>
                    </div>
                    <div class="card-body">
                        <form class="user" method="post" action="student-insurance-action.php">
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="company">Company Name</label>
                                    <input type="text" class="form-control" id="company" name="company"
                                           placeholder="Insurance Issuer" required>
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="date">Date Created</label>
                                    <input type="date" class="form-control" id="date" name="date"
                                           placeholder="Date Created">
                                </div>
                                <div class="col-sm-4">
                                    <label for="period">Period</label>
                                    <input type="number" class="form-control" id="period" name="period"
                                           placeholder="Period in Years" required="true">
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="package">Package</label>
                                    <input type="text" class="form-control" name="package"
                                        id="package" placeholder="Package Details" required="true">
                                </div>
                                <div class="col-sm-4">
                                    <label for="marital-status">Other Details</label>
                                    <input type="text" class="form-control" id="period" name="other"
                                           placeholder="If any">
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <input type="submit" class="btn btn-primary btn-block" value="submit" name="submit"/>
                                </div>
                            </div>
                        </form>
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