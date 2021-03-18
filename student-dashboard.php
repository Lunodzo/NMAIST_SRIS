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
                                    <p class="card-text">...</p>
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