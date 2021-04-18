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

    <title>SRIS - Hostels</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

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
                <h1 class="h3 mb-4 text-gray-800">Hostels</h1>
                <div class="card card-header-actions">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10 m-0 font-weight-bold text-primary">
                                Available Rooms
                            </div>
                            <div class="col-md-2 m-0 float-right">
                                <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#roomRequest">Request</button>
                            </div>
                        </div>
                        <?php
                        if (isset($_GET['success'])){?>
                            <div class="alert-success">
                                <p>Request submitted</p>
                            </div>
                        <?php
                        unset($_SESSION['success']);}
                        else if(isset($_GET['exists'])){
                            echo '<div class="alert-warning">';
                            echo '<p>You have a pending request</p>';
                            echo '</div>';
                        }



                        ?>

                    </div>
                    <div class="card-body">
                        <?php
                        //COUNT NUMBER OF AVAILABLE ROOMS
                        //HOSTEL A
                        $hostel_a = "SELECT * from unallocated_hostela";
                        $query = mysqli_query($conn, $hostel_a);
                        $hostela_count = mysqli_num_rows($query);

                        //HOSTEL B
                        $hostel_b = "SELECT * from unallocated_hostelb";
                        $queryb = mysqli_query($conn, $hostel_b);
                        $hostelb_count = mysqli_num_rows($queryb);

                        //PhD HOUSE
                        $phd_house = "SELECT * from unallocated_phd";
                        $queryphp = mysqli_query($conn, $phd_house);
                        $phd_count = mysqli_num_rows($queryphp);
                        ?>
                        <p><strong><?php echo $hostela_count; ?></strong> rooms available in Hostel A</p>
                        <p><strong><?php echo $hostelb_count; ?></strong> rooms available in Hostel B</p>
                        <p><strong><?php echo $phd_count; ?></strong> houses available at the PhD Village</p>
                    </div>
                </div>

<!--                ROOM REQUEST MODAL-->
                <div id="roomRequest" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="card-header">
                                <div class="row">
                                    <h5 class="modal-title">Room Request</h5>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <form method = "POST" action="student-hostel-request-action.php">
                                <div class="form-group">
                                    <label for="amount">Any Special need?</label>
                                    <input class="form-control" id="special" name="special" type="text" placeholder="Tell us if you have any special need">
                                </div>
                                <input class="btn btn-primary btn-sm" type="submit" name="submit" value="submit"/>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
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

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</body>

</html>
