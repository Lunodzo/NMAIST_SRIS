<?php
require 'connection.php';
session_start();
$role = $_SESSION['sess_userrole'];
$email = $_SESSION['sess_email'];
if(!isset($email) || $role!="student"){
    if(!isset($email) || $role!="admin"){
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

    <title>SRIS - Registration Process Start</title>

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
                <h1 class="h3 mb-4 text-gray-800">Registration Process</h1>
                <div class="card">
                    <div class="card-header border-bottom">
<!--                        Card tab titles-->
                        <ul class="nav nav-tabs card-header-tabs" id="cardTab" role="tablist">
                            <li class="nav-item">
                                <a <?php if(isset($_SESSION['basic_next'])){ echo 'class="nav-link disabled"';  }else{ echo 'class="nav-link active"';} ?> id="basic-tab" href="#basic" data-toggle="tab" role="tab" aria-controls="basic" aria-selected="true">Basic Info</a>
                            </li>
                            <li class="nav-item">
                                <a <?php if(isset($_SESSION['basic_next'])){echo 'class="nav-link active"';  }else{ echo 'class="nav-link disabled"';  } ?> id="document-tab" href="#document" data-toggle="tab" role="tab" aria-controls="document" aria-selected="true">Documents</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="payments-tab" href="#payments" data-toggle="tab" role="tab" aria-controls="payments" aria-selected="true">Payments</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="accommodation-tab" href="#accommodation" role="tab" aria-controls="accommodation" data-toggle="tab" aria-selected="true">Accommodation</a>
                            </li>
                        </ul>
                    </div>

<!--                    Tabs' contents-->
                    <div class="card-body">
                        <div class="tab-content" id="cardTabContent">
                            <div class="tab-pane fade show active" id="basic" role="tabpanel" aria-labelledby="basic-tab">
                                <h5 class="card-title">Basic information to start registration</h5>
                                <form action="student-reg-session-action.php" method="post">
                                    <div class="form-group row">
                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                            <label for="f_name">Academic Year</label>
                                            <?php
                                            $sql = "SELECT * FROM academic_year WHERE detail = 'active'";
                                            $query = mysqli_query($conn, $sql);
                                            $results = mysqli_fetch_assoc($query);
                                            ?>
                                            <input type="text" class="form-control" id="FirstName"
                                                   placeholder="<?php echo $results['year']; ?>" readonly>
                                        </div>
                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                            <label for="m_name">Semester</label>
                                            <?php
                                            $sql = "SELECT * FROM semester";
                                            $query = mysqli_query($conn, $sql);
                                            ?>
                                            <select class="form-control selectpicker" name="semester">
                                                <?php
                                                while($row = mysqli_fetch_assoc($query)){
                                                    echo "<option value=".$row['semester_id'].">".$row['semester_name']."</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="l_name">Year of Study</label>
                                            <select class="form-control selectpicker" name="year">
                                                <option>Year 1</option>
                                                <option>Year 2</option>
                                                <option>Year 3</option>
                                                <option>Year 4</option>
                                                <option>Year 5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-sm" name="submit" type="submit">Next</button>
                                </form>
                                <?php 
                                if(isset($_POST['submit'])){

                                }
                                ?>

                            </div>
                            <div class="tab-pane fade" id="document" role="tabpanel" aria-labelledby="document-tab">
                                <h5 class="card-title">Documents</h5>
                                <p>Upload the following documents to proceed</p>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>Document Category</th>
                                            <th>Document Type</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
//                                        $sql = "SELECT * FROM document_category, document_type, student_document, student
//                                        where document_category.document_category_id = document_type.document_category_id
//                                        AND document_type.document_type_id = student_document.document_type_id AND
//                                              student.student_id = student_document.student_id AND email = '$email'";

                                       //$sql = "SELECT * FROM document_category, document_type, student WHERE NOT EXISTS(SELECT * FROM uploaded_docs WHERE email='$email')";
                                       $sql = "SELECT * FROM document_category, document_type, student WHERE email='$email' AND 
                                                              document_category.document_category_id = document_type.document_category_id";
                                        if($student_results = mysqli_query($conn, $sql)){
                                            while ($row = mysqli_fetch_assoc($student_results)) {
                                                echo "<tr>";
                                                echo "<td>".$row['document_cat']." </td>";
                                                echo "<td>".$row['document_type']." </td>";
                                                echo "<td> <span class='badge badge-danger'>Required</span></td>";
                                                echo "<td>";
                                                echo "&nbsp&nbsp&nbsp&nbsp<button class='btn btn-primary btn-sm' data-toggle='modal' data-target='#doc-upload'><i class='fas fa-file-upload fa-sm'></i> Upload</button>";
                                                echo "</td>";
                                                echo "</tr>";
                                            }
                                        }

                                        ?>
                                        <!--                                DOCUMENT UPLOAD TOGGLE-->
                                        <div id="doc-upload" class="modal" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <div class="card-header">
                                                            <div class="row block">
                                                                <h5 class="modal-title">Document Upload</h5>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="card-body">
                                                        <form method="post" action="student-upload-document-action.php" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <label for="student">This is you Uploading</label>
                                                                <select name="student" class="form-control" id="student">
                                                                    <?php
                                                                    $sql = "SELECT * from student WHERE email = '$email'";
                                                                    if($sql_results = mysqli_query($conn, $sql)){
                                                                        while($row = mysqli_fetch_assoc($sql_results)){
                                                                            echo "<option name='student' value=".$row['student_id'].">".$row['f_name']." ".$row['l_name']."</option>";
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="doc-type">Document Type</label>
                                                                <select name="doc-type" class="form-control" id="bill">
                                                                    <?php
                                                                    $sql = "SELECT * from document_type";
                                                                    if($sql_results = mysqli_query($conn, $sql)){
                                                                        while($row = mysqli_fetch_assoc($sql_results)){
                                                                            echo "<option value=".$row['document_type_id'].">".$row['document_type']."</option>";
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>File | </label><label class="text-danger small">&nbspPDF only</label>
                                                                <input class="form-control" name="file" type="file" accept="application/pdf">
                                                            </div>
                                                            <input class="btn btn-primary btn-sm" type="submit" name="submit" value="submit"></input>
                                                        </form>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </tbody>
                                    </table>
                                    <button class="btn btn-primary btn-sm">Next</button>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="payments" role="tabpanel" aria-labelledby="payments-tab">
                                <h5 class="card-title">Bills</h5>
                                <p>Pay all necessary bills to proceed to next step</p>

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

                            <div class="tab-pane fade" id="accommodation" role="tabpanel" aria-labelledby="accommodation-tab">
                                <h5 class="card-title">Accommodation</h5>
                                <p class="card-text">Tell us if you will stay in-campus or not. NB: We have limited slots,
                                    students will be allocated rooms according to the Accommodation policy and by considering
                                    First Come requests</p>
                                <form class="user" action="#">
                                    <div class="form-group col-md-6">
                                        <label for="accommodation">Your stay plan</label>
                                        <select class = "selectpicker form-control" id = "sponsor" name="sponsor">
                                            <option>In-campus</option>
                                            <option>Off-campus</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input class="form-group btn btn-primary" name="submit" type="submit"/>
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