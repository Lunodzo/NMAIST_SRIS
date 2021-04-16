<?php
session_start();
$role = $_SESSION['sess_userrole'];
if(!isset($_SESSION['sess_email']) || $role != "admin"){
    if(!isset($_SESSION['sess_email']) || $role != "accountant"){
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

    <title>SRIS - Blank</title>

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
            if(isset($_SESSION['sess_email']) && $role == "admin"){
                include 'navigation.php';
            }else if(isset($_SESSION['sess_email']) && $role == "accountant"){
                include 'navigation-accounts.php';
            }
            require 'connection.php';
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
                    <h1 class="h3 mb-4 text-gray-800">Accounts Department</h1>

                    <?php require 'header-summary-accounts.php'; ?>

                    <h1 class="h4 mb-4 text-gray-800">Pending Bills</h1>

                    <!-- Students Pending Bills -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-6">
                            <div class="row">
                                <div class="col-md-10 m-0 font-weight-bold text-primary">
                                    <h5>Pending Bills</h5>
                                    <div class="font-weight-bold text-success">
                                        <?php
                                        if(isset($_GET['success'])){
                                            $_SESSION['message'] = 'Your bill has been created';
                                            $message = $_SESSION['message'];
                                            echo $message;
                                        }else if(isset($_GET['success1'])){
                                            $_SESSION['message'] = 'Your bill has been cleared';
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
                                        <th>Names</th>
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
                                    $sql = "SELECT * FROM `student_bill_view` where status = 'pending'";
                                    if ($sql_results = mysqli_query($conn, $sql)){
                                        while($row = mysqli_fetch_assoc($sql_results)){
                                            echo "<tr>";
                                            echo "<td>".$row['f_name']."&nbsp".$row['l_name']."</td>";
                                            echo "<td>".$row['bill_name']." </td>";
                                            echo "<td>".$row['control_no']." </td>";
                                            echo "<td>".$row['date_created']." </td>";
                                            echo "<td>".$row['amount']." </td>";
                                            echo "<td><span class='badge badge-warning'>".$row['status']."</span></td>";
                                            echo "<td><a class='btn btn-success btn-sm btn-block' href='accounts-bill-clear.php?bill-id=".$row['control_no']."'> Clear </a></td>";
                                            echo "</tr>";
                                        }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card card-header-actions">
                        <div class="card-header container-fluid">
<!--                            <div class="row">-->
<!--                                <div class="col-md-10">-->
<!--                                    General Instructions-->
<!--                                </div>-->
<!--                                <div class="col-md-10 float-right">-->
<!--                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#billForm">Create Bill</button>-->
<!--                                </div>-->
<!--                            </div>-->
                            <div class="row">
                                <div class="col-md-10">
                                    <h3>General Instructions</h3>
                                </div>
                                <div class="col-md-2 float-right">
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#billForm">Create Bill</button>
                                </div>
                            </div>


                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <ul class="nav nav-pills flex-column" id="cardPillVertical" role="tablist">
                                        <li class="nav-item"><a class="nav-link active" id="overview-pill-vertical" href="#overviewPillVertical" data-toggle="tab" role="tab" aria-controls="overview" aria-selected="true">How to create Bills</a></li>
                                        <li class="nav-item"><a class="nav-link" id="example-pill-vertical" href="#examplePillVertical" data-toggle="tab" role="tab" aria-controls="example" aria-selected="false">How to create Control Number</a></li>
                                        <li class="nav-item"><a class="nav-link" id="payments" href="#examplePillVertical1" data-toggle="tab" role="tab" aria-controls="example" aria-selected="false">How to do payments</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-9">
                                    <div class="tab-content" id="cardPillContentVertical">
                                        <div class="tab-pane fade show active" id="overviewPillVertical" role="tabpanel" aria-labelledby="overview-pill-vertical">
                                            <h5 class="card-title">Follow these basic steps</h5>
                                            <ol>
                                                <li>To create bill, click bills link then My bills.</li>
                                                <li>Click create bill button</li>
                                                <li>Select currency</li>
                                                <li>Select bill items (services) you want to pay for. If you want to create bill with many items click "Add Bill Item" button to select bill another item.</li>
                                                <li>Click submit button to create bill.</li>
                                            </ol>
                                            <p class="card-text alert-warning">NB: If you want to do payments without specifying
                                                bill items, just select the Lumpsum option from the bill item selection and enter
                                                the total amount you want pay.</p>
                                        </div>

                                        <div class="tab-pane fade" id="examplePillVertical" role="tabpanel" aria-labelledby="example-pill-vertical">
                                            <h5 class="card-title">Follow these basic steps</h5>
                                            <ol>
                                                <li>Control number can be obtained only after creating bill.</li>
                                                <li>From the Pending bills page, Click "Get control number button on the right(The blue button)"</li>
                                            </ol>
                                        </div>
                                        <p class="card-text alert-warning">
                                            For the purpose of this project, we automatically generate CN which is independent to any other system.
                                        </p>

                                        <div class="tab-pane fade" id="examplePillVertical1" role="tabpanel" aria-labelledby="example-pill-vertical">
                                            <h5 class="card-title">Follow these basic steps to pay</h5>
                                            <p>After obtaining control number, Record it and go to any of the following banks for payments (CRDB, TPB and NMB)
                                                Upon your arrival at any of the banks listed, provide the control number to the teller to process the payment.</p>
                                            <hr>
                                            <p>Payments can also be done through Mobile Money (Tigo-Pesa, M-pesa, and Airtel Money) through the following steps:</p>
                                            <ol>
                                                <li>Dial *150* 01#, or *150*00#, or *150*60# respectively</li>
                                                <li>Select Pay Bills</li>
                                                <li>Government Payment</li>
                                                <li>Enter Reference Number (Contorl Number)</li>
                                                <li>Enter the due amount</li>
                                                <li>Confirm [by entering your password/pass code]</li>
                                            </ol>

                                            <p class="card-text alert-warning">
                                                For purposed of this project, Go to the pending bills list and click Pay.
                                            </p>
                                        </div>
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
                                        <form method="post" action="accounts-bill-post.php">
                                            <div class="form-group">
                                                <label for="student">Choose Student</label>
                                                <select name="student" class="form-control" id="student">
                                                    <?php
                                                    $sql = "SELECT * from student";
                                                    if($sql_results = mysqli_query($conn, $sql)){
                                                        while($row = mysqli_fetch_assoc($sql_results)){
                                                            echo "<option name='student' value=".$row['student_id'].">".$row['f_name']." ".$row['l_name']."</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="bill">Choose Bill</label>
                                                <select name="bill" class="form-control" id="bill">
                                                    <?php
                                                    $sql = "SELECT * from bill";
                                                    if($sql_results = mysqli_query($conn, $sql)){
                                                        while($row = mysqli_fetch_assoc($sql_results)){
                                                            echo "<option value=".$row['bill_id'].">".$row['bill_name']."</option>";
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
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>