<?php
require 'connection.php';
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

    <title>SRIS - Profile</title>

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
                <h1 class="h3 mb-4 text-gray-800">My Profile</h1>
                <div class="row">

                    <!-- SECOND CARD -->
                    <div class="col-xl-3 col-lg-5">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div
                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Profile Picture</h6>
                            </div>

                            <!-- Profile Picture -->
                            <div class="card-body">
                                <div class="row">
                                    <img class="img-profile rounded-circle"
                                         src="img/undraw_profile_3.svg" alt="abc">
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <a type="file" href="#" class="btn btn-primary btn-block">
                                            Upload Picture </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- PROFILE DETAILS -->
                    <div class="col-xl-9 col-lg-7">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Personal Details</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <form class="user" method="post" action="student-registration-upload.php">
                                    <div class="form-group row">
                                        <?php
                                        $sql = "SELECT * FROM student, course, sponsor WHERE sponsor.sponsor_id = student.sponsor_id
                                                                        AND course.course_id = student.course_id AND student.email = '$email'";
                                        $sql_results = mysqli_query($conn, $sql);
                                        $row = mysqli_fetch_assoc($sql_results);
                                        ?>
                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                            <label for="f_name">First Name</label>
                                            <input type="text" id="f_name" name="f_name" class="form-control"
                                                   placeholder="<?php echo $row['f_name']; ?>" readonly>
                                        </div>
                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                            <label for="m_name">Middle Name</label>
                                            <input type="text" name="m_name" class="form-control" id="m_name"
                                                   placeholder="<?php echo $row['m_name']; ?>" readonly>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="l_name">Last Name</label>
                                            <input type="text" name="l_name" class="form-control" id="l_name"
                                                   placeholder="<?php echo $row['l_name']; ?>" readonly>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                            <label for="gender">Gender</label>
                                            <input type="sex" class="form-control " name="gender"
                                                   id="gender" placeholder="<?php echo $row['sex']; ?>" readonly>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="marital">Marital Status</label>
                                            <input type="marital" class="form-control" name="marital"
                                                   id="marital" placeholder="<?php echo $row['marital_status']; ?>" readonly>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="date">Birth Date</label>
                                            <input type="text" class="form-control" name="date"
                                                   id="date" placeholder="<?php echo $row['dob']; ?>" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label for="reg_no">Registration Number</label>
                                            <input type="text" class="form-control" id="reg_no" name="reg_no"
                                                   placeholder="<?php echo $row['student_id']; ?>" readonly>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="phone">Phone Number</label>
                                            <input type="text" class="form-control" id="phone" name="phone"
                                                   placeholder="<?php echo $row['phone']; ?>" required>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="email">Email Address</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                   placeholder="<?php echo $row['email']; ?>" readonly>
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                            <label for="address">Address</label>
                                            <input type="address" class="form-control" name="address"
                                                   id="address" placeholder="<?php echo $row['address']; ?>" required="true">
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="nationality">Nationality</label>
                                            <input type="country" class="form-control" name="nationality"
                                                   id="nationality" placeholder="<?php echo $row['nationality']; ?>" readonly>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="course">Programme</label>
                                            <input type="text" class="form-control" name="course"
                                                   id="nationality" placeholder="<?php echo $row['course_short_form']; ?>" readonly>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                            <label for="cohort">Cohort</label>
                                            <input type="number" class="form-control"
                                                   id="cohort" placeholder="<?php echo $row['cohort']; ?>" readonly>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="l_name">Sponsorship</label>
                                            <select class = "selectpicker form-control" id = "sponsor" name="sponsor">
                                                <!-- FETCH LIST FROM THE DB -->
                                                <option value="" disabled selected hidden><?php echo $row['name']; ?></option>
                                                <option>Private</option>
                                                <option>Scholarship</option>
                                                <option>Divorced</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <!-- FETCH LIST FROM THE DB -->
                                            <label for="l_name">Study Type</label>
                                            <input type="text" class="form-control"
                                                   id="study_type" placeholder="<?php echo $row['study_type']; ?>" readonly>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3">
                                            <a type="submit" href="#" class="btn btn-primary btn-block">
                                                Save Changes
                                            </a>
                                        </div>

                                    </div>
                                </form>
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