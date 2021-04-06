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

    <title>SRIS - Student Dashboard</title>
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-4 text-gray-800">Student Dashboard</h1>
                    </div>

                    <!--Header summary-->
                    <?php require 'header-summary-student.php'; ?>

                        <div class="card">
                            <div class="card-header border-bottom">
                                <ul class="nav nav-tabs card-header-tabs" id="cardTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="overview-tab" href="#overview" data-toggle="tab" role="tab" aria-controls="overview" aria-selected="true">Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="example-tab" href="#bills" data-toggle="tab" role="tab" aria-controls="example" aria-selected="false">Bills</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="example-tab" href="#payments" data-toggle="tab" role="tab" aria-controls="example" aria-selected="false">Payments</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="" href="#document" data-toggle="tab" role="tab" aria-controls="document" aria-selected="false">Documents</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <div class="tab-content" id="cardTabContent">
                                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                                        <h5 class="card-title">My Profile</h5>
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

                                    <div class="tab-pane fade" id="bills" role="tabpanel" aria-labelledby="example-tab">
                                        <h5 class="card-title">Bills</h5>

<!--                                        STUDENTS BILLS-->
                                        <div class="card shadow mb-4">
                                            <div class="card-header py-6">
                                                <div class="row">
                                                    <div class="col-md-10 m-0 font-weight-bold text-primary">
                                                        <h4>Pending Bills</h4>
                                                        <div class="font-weight-bold text-success">
                                                            <?php
                                                            if(isset($_GET['success'])){
                                                                $_SESSION['message'] = 'Your bill has been created';
                                                                $message = $_SESSION['message'];
                                                                echo $message;
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-2 m-0 float-right">
                                                        <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#billForm">Create Bill</button>
                                                    </div>

                                                </div>
                                            </div>



                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                        <thead>
                                                        <tr>
                                                            <th>Bill Name</th>
                                                            <th>Control Number</th>
                                                            <th>Date Created</th>
                                                            <th>Amount</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                        <?php
                                                        $sql = "SELECT * FROM `student_bill_view` where email = '$email' && status='pending'";
                                                        if ($sql_results = mysqli_query($conn, $sql)){
                                                            while($row = mysqli_fetch_assoc($sql_results)){
                                                                echo "<tr>";
                                                                echo "<td>".$row['bill_name']." </td>";
                                                                echo "<td>".$row['control_no']." </td>";
                                                                echo "<td>".$row['date_created']." </td>";
                                                                echo "<td>".$row['amount']." </td>";
                                                                echo "<td><span class='badge badge-warning'>".$row['status']."</span></td>";
                                                                echo "<td><button class='btn btn-success btn-sm btn-block'> Pay </button></td>";
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

                                    <div class="tab-pane fade" id="payments" role="tabpanel" aria-labelledby="example-tab">
                                        <h5 class="card-title">Payments</h5>

<!--                                        STUDENTS' PAYMENTS-->
                                        <div class="card shadow mb-4">
                                            <div class="card-header py-6">
                                                <div class="row">
                                                    <div class="col-md-10 m-0 font-weight-bold text-primary">
                                                        <h4>Paid Bills</h4>
                                                        <div class="font-weight-bold text-success">
                                                            <?php
                                                            if(isset($_GET['bill-id'])){
                                                                $_SESSION['message'] = 'Your bill has been paid';
                                                                $message = $_SESSION['message'];
                                                                echo $message;
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>



                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                        <thead>
                                                        <tr>
                                                            <th>Bill Name</th>
                                                            <th>Control Number</th>
                                                            <th>Date Created</th>
                                                            <th>Amount</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                        <?php
                                                        $sql = "SELECT * FROM `student_bill_view` where email = '$email' && status='paid'";
                                                        if ($sql_results = mysqli_query($conn, $sql)){
                                                            while($row = mysqli_fetch_assoc($sql_results)){
                                                                echo "<tr>";
                                                                echo "<td>".$row['bill_name']." </td>";
                                                                echo "<td>".$row['control_no']." </td>";
                                                                echo "<td>".$row['date_created']." </td>";
                                                                echo "<td>".$row['amount']." </td>";
                                                                echo "<td><span class='badge badge-warning'>".$row['status']."</span></td>";
                                                                echo "<td><button class='btn btn-success btn-sm btn-block'> Print </button></td>";
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
                                    <div class="tab-pane fade" id="document" role="tabpanel" aria-labelledby="document-tab">
                                        <h5 class="card-title">Documents</h5>
                                        <p class="card-text">...</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <!--                        BILL FORM MODEL-->
                    <div id="billForm" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="card-header">
                                        <div class="row block">
                                            <h5 class="modal-title">Bill</h5>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                    </div>

                                </div>

                                <div class="card-body">
                                    <form method = "POST" action="student-bill-post.php">
                                        <!--                                        <div class="form-group">-->
                                        <!--                                            <label for="student">Choose Student</label>-->
                                        <!--                                            <select class="form-control" id="student">-->
                                        <!--                                                --><?php
                                        //                                                $sql = "SELECT * from student where email = '$email'";
                                        //                                                $sql_results = mysqli_query($conn, $sql);
                                        //                                                $row = mysqli_fetch_assoc($sql_results);
                                        //                                                //echo "<option>".$sql_results['f_name']."</option>";
                                        //                                                ?>
                                        <!--                                                <option>--><?php //echo $row['f_name']." ".$row['l_name']; ?><!--</option>-->
                                        <!--                                            </select>-->
                                        <!--                                        </div>-->

                                        <div class="form-group">
                                            <label for="bill">Choose Bill</label>
                                            <select class="form-control" id="bill" name="bill">
                                                <?php
                                                $sql = "SELECT * from bill";
                                                if($sql_results = mysqli_query($conn, $sql)){
                                                    while($row = mysqli_fetch_assoc($sql_results)){
                                                        echo "<option name='bill' value=".$row['bill_id'].">".$row['bill_name']."</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="amount">Amount</label>
                                            <input class="form-control" id="amount" name="amount" type="number" placeholder="Enter Amount">
                                        </div>
                                        <button class="btn btn-primary btn-sm" type="submit">Create</button>
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

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>