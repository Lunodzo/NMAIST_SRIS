<?php
session_start();
$role = $_SESSION['sess_userrole'];
$email = $_SESSION['sess_email'];
if(!isset($_SESSION['sess_email']) || $role != "admin"){
    if(!isset($_SESSION['sess_email']) || $role != "welfare"){
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

    <title>SRIS - Hostel Allocation</title>

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
    if($role == "welfare"){
        require 'navigation-welfare.php';
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
                <h1 class="h3 mb-4 text-gray-800">Hostel Allocation</h1>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Room Requests</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Student Names</th>
                                    <th>Gender</th>
                                    <th>Date Request Submitted</th>
                                    <th>Special Need</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql = "SELECT * from student, room_requests WHERE student.student_id = room_requests.student_id";

                                if($student_results = mysqli_query($conn, $sql)){
                                    while ($row = mysqli_fetch_assoc($student_results)) {
                                        $room = $row['room_id'];
                                        echo "<tr>";
                                        echo "<td>".$row['f_name']."</td>";
                                        echo "<td>".$row['sex']." </td>";
                                        echo "<td>".$row['date_requested']." </td>";
                                        echo "<td>".$row['special_need']." </td>";
                                        echo "<td><button class='btn btn-success btn-sm btn-block' data-toggle='modal' data-target='#roomForm'> Allocate</td>";
                                        echo "</tr>";
                                    }
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!--                        ROOM ALLOCATION FORM MODEL-->
                <div id="roomForm" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="card-header">
                                    <div class="row block">
                                        <h5 class="modal-title">Room Allocation</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                </div>

                            </div>
                            <?php
                            //$sql = "SELECT * from student JOIN room_requests ON student.student_id = room_requests.student_id";
                            $sql = "SELECT room_requests.student_id, f_name, l_name, sex, date_requested, special_need 
                                    FROM room_requests INNER JOIN student ON student.student_id = room_requests.student_id 
                                        LEFT JOIN room_allocation ON room_allocation.request_id = room_requests.request_id";
                            $query = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($query);
                            $request = $row['request_id'];
                            ?>

                            <div class="card-body">
                                <?php echo "<form method = 'POST' action='welfare-allocate-action.php?request=".$row['request_id']."'>";?>
                                    <div class="form-group">
                                        <label for="bill">Choose Room</label>
                                        <select class="form-control" id="bill" name="bill">
                                            <?php
                                            $sql = "SELECT * from room";
                                            if($sql_results = mysqli_query($conn, $sql)){
                                                while($row = mysqli_fetch_assoc($sql_results)){
                                                    echo "<option name='room' value=".$row['room_id'].">".$row['room_name']."</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <button class="btn btn-primary btn-sm" type="submit">Allocate</button>
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
