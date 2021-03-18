<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SRIS - Register Student</title>

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
        <?php include 'navigation.php'; ?>
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
                    <h1 class="h3 mb-4 text-gray-800">Student Registration</h1>
                    <form class="user" method="post" action="register_student.php">
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="FirstName"
                                    placeholder="First Name" required="true">
                            </div>
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="MiddleName"
                                    placeholder="Middle Name">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control form-control-user" id="LastName"
                                    placeholder="Last Name" required="true">
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <select class = "selectpicker form-control" id = "sex" name="sex">
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                                <!-- <input type="sex" class="form-control form-control-user"
                                    id="sex" placeholder="Sex" required="true"> -->
                            </div>
                            <div class="col-sm-4">
                                <select class = "selectpicker form-control" id = "marriage" name="marriage">
                                    <option>Single</option>
                                    <option>Married</option>
                                    <option>Devorced</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <input type="date" class="form-control form-control-user"
                                    id="date" placeholder="Date of Birth" required="true">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-4">
                                <input type="text" class="form-control form-control-user" id="RedNumber"
                                    placeholder="Registration No" required="true">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control form-control-user" id="phone"
                                    placeholder="Phone Number" required="true">
                            </div>
                            <div class="col-sm-4">
                                <input type="email" class="form-control form-control-user" id="InputEmail"
                                placeholder="Email Address" required="true">
                            </div>
                            
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <input type="address" class="form-control form-control-user"
                                    id="address" placeholder="Address" required="true">
                            </div>
                            <div class="col-sm-4">
                                <input type="country" class="form-control form-control-user"
                                    id="nation" placeholder="Nationality" required="true">
                            </div>
                            <div class="col-sm-4">
                                <select class = "selectpicker form-control" id = "course" name="corse">
                                    <!-- FETCH LIST FROM THE DB -->
                                    <option>Single</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <input type="number" class="form-control form-control-user"
                                    id="cohort" placeholder="Cohort" required="true">
                            </div>
                            <div class="col-sm-4">
                                <select class = "selectpicker form-control" id = "sponsor" name="sponsor">
                                    <!-- FETCH LIST FROM THE DB -->
                                    <option>Single</option>
                                    <option>Married</option>
                                    <option>Devorced</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <select class = "selectpicker form-control" id = "study_type" name="study_type">
                                    <!-- FETCH LIST FROM THE DB -->
                                    <option>Project</option>
                                    <option>Dissertation</option>
                                    <option>Thesis</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4">
                                <a type="submit" href="login.html" class="btn btn-primary btn-user btn-block">
                                Register Student
                                </a> 
                            </div>
                        
                        </div>
                    </form>
                            <hr>
                            <h3>OR</h3>
                            <p>Upload Bulk Students</p>
                            <form method="post" action="import_bulk.php" enctype="multipart/form-data">
                                <div class="col-sm-6">
                                <div class="input-group-append">
                                    <input id="upload" type="file" class="form-control border-0" required>
                                    <input class="btn btn-primary btn-user btn-block" type="submit" name="submit_file" value="Submit"/>
                                    
                                </div>
                            </div>
                            </form>
                            

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