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

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include 'student-navigation.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include 'top_bar.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Student Dashboard</h1>
                    <div class="card">
                        <div class="card-header border-bottom">
                            <ul class="nav nav-tabs card-header-tabs" id="cardTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="overview-tab" href="#overview" data-toggle="tab" role="tab" aria-controls="overview" aria-selected="true">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="example-tab" href="#example" data-toggle="tab" role="tab" aria-controls="example" aria-selected="false">Bills & Payments</a>
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

                                                <!-- Card Body -->
                                                <div class="card-body">
                                                    <div class="row">
                                                        <img class="img-profile rounded-circle"
                                                            src="img/undraw_profile_3.svg" alt="abc">
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <a type="button" href="#" class="btn btn-primary btn-block">
                                                                    Upload Picture </a> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- FIRST CARD -->
                                        <div class="col-xl-9 col-lg-7">
                                            <div class="card shadow mb-4">
                                                <!-- Card Header - Dropdown -->
                                                <div
                                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                    <h6 class="m-0 font-weight-bold text-primary">Personal Details</h6>
                                                    <div class="dropdown no-arrow">
                                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- Card Body -->
                                                <div class="card-body">
                                                    <form class="user" method="post" action="student_registration_upload.php">
                                                            <div class="form-group row">
                                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                                    <label for="f_name">First Name</label>
                                                                    <input type="text" class="form-control" id="FirstName"
                                                                        placeholder="Mike" readonly>
                                                                </div>
                                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                                    <label for="m_name">Middle Name</label>
                                                                    <input type="text" class="form-control" id="MiddleName"
                                                                        placeholder="Zakayo" readonly>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <label for="l_name">Last Name</label>
                                                                    <input type="text" class="form-control" id="LastName"
                                                                        placeholder="Majham" readonly>
                                                                </div>
                                                            </div>


                                                            <div class="form-group row">
                                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                                    <label for="gender">Gender</label>
                                                                    <input type="sex" class="form-control "
                                                                        id="sex" placeholder="Male" readonly>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <label for="marital">Marital Status</label>
                                                                    <input type="marital" class="form-control"
                                                                        id="marital" placeholder="Single" readonly>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <label for="date">Birth Date</label>
                                                                    <input type="text" class="form-control"
                                                                        id="date" placeholder="23/02/1880" readonly>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <div class="col-sm-4">
                                                                    <label for="reg_no">Registration Number</label>
                                                                    <input type="text" class="form-control" id="RedNumber"
                                                                        placeholder="M087/T19" readonly>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <label for="phone">Phone Number</label>
                                                                    <input type="text" class="form-control" id="phone"
                                                                        placeholder="+255765364857" required>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <label for="email">Email Address</label>
                                                                    <input type="email" class="form-control" id="InputEmail"
                                                                    placeholder="majhamm@nm-aist.ac.tz" readonly>
                                                                </div>
                                                                
                                                            </div>

                                                            <div class="form-group row">
                                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                                    <label for="address">Address</label>
                                                                    <input type="address" class="form-control"
                                                                        id="address" placeholder="Mererani, Arusha" required="true">
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <label for="nationality">Nationality</label>
                                                                    <input type="country" class="form-control"
                                                                        id="nation" placeholder="Tanzanian" readonly>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <label for="l_name">Programme</label>
                                                                    <select class = "selectpicker form-control" id = "course" name="course">
                                                                        <!-- FETCH LIST FROM THE DB -->
                                                                        <option>WiMC</option>
                                                                        <option>ICSE</option>
                                                                    </select>
                                                                </div>
                                                            </div>


                                                            <div class="form-group row">
                                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                                    <label for="cohort">Cohort</label>
                                                                    <input type="number" class="form-control"
                                                                        id="cohort" placeholder="9" readonly>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <label for="l_name">Sponsorship</label>
                                                                    <select class = "selectpicker form-control" id = "sponsor" name="sponsor">
                                                                        <!-- FETCH LIST FROM THE DB -->
                                                                        <option>Private</option>
                                                                        <option>Scholarship</option>
                                                                        <option>Devorced</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <!-- FETCH LIST FROM THE DB -->
                                                                    <label for="l_name">Study Type</label>
                                                                    <input type="text" class="form-control"
                                                                    id="study_type" placeholder="Dissertation" readonly>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <a type="submit" href="login.html" class="btn btn-primary btn-block">
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
                                <div class="tab-pane fade" id="example" role="tabpanel" aria-labelledby="example-tab">
                                    <h5 class="card-title">Bills and Payments</h5>
                                    <p class="card-text">...</p>
                                </div>
                                <div class="tab-pane fade" id="document" role="tabpanel" aria-labelledby="document-tab">
                                    <h5 class="card-title">Documents</h5>
                                    <p class="card-text">...</p>
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