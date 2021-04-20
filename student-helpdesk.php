<?php
session_start();
$role = $_SESSION['sess_userrole'];
$email = $_SESSION['sess_email'];
if(!isset($_SESSION['sess_email']) || $role!="student"){
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

    <title>SRIS - Student HelpDesk</title>

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
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h3 class="h3 mb-4 text-gray-800">Student HelpDesk</h3>
                </div>
                <div class="text-body">
                    <?php
                    if(isset($_GET['success'])){
                        echo "<label class='alert-success small'>Request Sent</label>";
                    }else if (isset($_GET['failed'])){
                        echo "<label class='alert-warning'>Request submission failed</label>";
                    }else if(isset($_GET['exists'])){
                        echo "<label class='alert-warning'>Request exists</label>";
                    }else if(isset($_GET['success_service'])){
                        echo "<label class='alert-warning'>Request Sent</label>";
                    }else if(isset($_GET['failed_service'])){
                        echo "<label class='alert-warning'>Request failed</label>";
                    }else if(isset($_GET['exists_service'])){
                        echo "<label class='alert-warning'>Request exists</label>";
                    }
                    ?>
                </div>

                <div class="card">
                    <div class="card-header border-bottom">
                        <ul class="nav nav-tabs card-header-tabs" id="cardTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="overview-tab" href="#overview" data-toggle="tab" role="tab"
                                   aria-controls="overview" aria-selected="true">Service Request</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="" href="#document" data-toggle="tab" role="tab" aria-controls="document"
                                   aria-selected="false">Counseling </a>
                            </li>
                            <li>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <div class="tab-content" id="cardTabContent">
                            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                                <h5 class="card-title">Submit Service request</h5>
                                <div class="row">

                                    <!-- FORM CARD -->
                                    <div class="col-xl-12 col-lg-7">
                                        <div class="card shadow mb-4">
                                            <?php
                                            $sql = "SELECT * FROM student where email = '$email'";
                                            $query = mysqli_query($conn, $sql);
                                            $result = mysqli_fetch_assoc($query);
                                            ?>
                                            <!-- Card Header - Dropdown -->
                                            <div
                                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                <h6 class="m-0 font-weight-bold text-primary">Request Form</h6>
                                                <div class="dropdown no-arrow">
                                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    </a>
                                                </div>
                                            </div>

                                            <!-- Card Body -->
                                            <div class="card-body">
                                                <form class="user" method="POST" action="student-service-action.php">
                                                    <div class="form-group row">
                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                            <label for="reg-no">Registration Number</label>
                                                            <input type="text" class="form-control" id="reg-no"
                                                                   name ="reg-no" placeholder="<?php echo $result['student_id']; ?>" readonly/>
                                                        </div>
                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                            <label for="phone">Phone Number</label>
                                                            <input type="tel" class="form-control" id="phone"
                                                                   name="phone" placeholder="<?php echo $result['phone']; ?>" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                                            <label for="email">Email</label>
                                                            <input type="email" class="form-control " id="email"
                                                                   placeholder="<?php echo $result['email']; ?>" name="email" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-sm-6">
                                                            <label for="department">Department</label>
                                                            <select class = "selectpicker form-control" id = "department" name="department">
                                                                <option>IT</option>
                                                                <option>Plumbing</option>
                                                                <option>Electricity</option>
                                                                <option>Other</option>
                                                                <option>Other</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label for="location">Location</label>
                                                            <input type="text" class="form-control" id="location"
                                                                   name="location" placeholder="Indicate where is the problem?" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                                            <label for="description">Problem Description</label>
                                                            <textarea class= "form-control" name = "description"
                                                                      placeholder="Describe your problem"></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <input type="submit" name="submit" class="btn btn-primary btn-block"/>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="document" role="tabpanel" aria-labelledby="overview-tab">
                                <h5 class="card-title">Request an Appointment</h5>
                                <div class="row">

                                    <!-- FORM CARD -->
                                    <div class="col-xl-12 col-lg-7">
                                        <div class="card shadow mb-4">
                                            <!-- Card Header - Dropdown -->
                                            <div
                                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                <h6 class="m-0 font-weight-bold text-primary">Appointment Request Form</h6>
                                                <div class="dropdown no-arrow">
                                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    </a>
                                                </div>
                                            </div>

                                            <!-- Card Body -->
                                            <div class="card-body">
                                                <form class="user" method="POST" action="student-appointment-action.php">
                                                    <div class="form-group row">
                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                            <label for="reg-no">Registration Number</label>
                                                            <input type="text" class="form-control" id="reg-no" name="reg-no"
                                                                   placeholder="<?php echo $result['student_id']; ?>" readonly>
                                                        </div>
                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                            <label for="phone-no">Phone Number</label>
                                                            <input type="tel" class="form-control" id="phone-no" name="phone"
                                                                   placeholder="<?php echo $result['phone']; ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                                            <label for="email">Email</label>
                                                            <input type="email" class="form-control " id="email"
                                                                   placeholder="<?php echo $result['email']; ?>" name="email">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-sm-6">
                                                            <label for="department">Nature of Service</label>
                                                            <select class = "selectpicker form-control" id = "department" name="nature">
                                                                <option>Consultation</option>
                                                                <option>Counselling</option>
                                                                <option>Advise</option>
                                                                <option>Moral support</option>
                                                                <option>Religious</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label for="department">Hostel</label>
                                                            <select class = "selectpicker form-control" id = "hostel" name="hostel">
                                                                <option>Hostel A</option>
                                                                <option>Hostel B</option>
                                                                <option>PhD House</option>
                                                                <option>Off-Campus</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                                            <label for="description">Details</label>
                                                            <textarea class= "form-control" rows = "5" name="details" placeholder="Any helpful details">
                                                                </textarea>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block"/>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>