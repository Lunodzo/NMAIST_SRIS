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

    <title>SRIS - Documents Repository</title>

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
                <h1 class="h3 mb-4 text-gray-800">Documents Repository</h1>

                <!-- Document List Table -->

                <div class="card shadow mb-4 card-header-actions">
                    <div class="card-header">
                        All Documents <br>

                        <?php
                        if(isset($_GET['success'])){
                            echo "<label class='alert-success small'>Document Uploaded</label>";
                        }else if (isset($_GET['failed'])){
                            echo "<label class='alert-warning'>Document Upload Failed</label>";
                        }else if (isset($_GET['none'])){
                            echo "<label class='alert-warning'>No file</label>";
                        }else if (isset($_GET['problem'])){
                            echo "<label class='alert-warning'>There is a problem with a file</label>";
                        }else if(isset($_GET['deleted'])){
                            echo "<label class='alert-warning'>A file has been deleted</label>";
                        }else if(isset($_GET['deleted_failed'])){
                            echo "<label class='alert-warning small'>Deletion failed</label>";
                        }
                        ?>
                        <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#doc-upload">Upload</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>File Name</th>
                                    <th>Document Category</th>
                                    <th>Document Type</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql = "SELECT * FROM document_category, document_type, student_document, student 
                                        where document_category.document_category_id = document_type.document_category_id 
                                        AND document_type.document_type_id = student_document.document_type_id AND 
                                              student.student_id = student_document.student_id AND email = '$email'";
                                if($student_results = mysqli_query($conn, $sql)){
                                    while ($row = mysqli_fetch_assoc($student_results)) {
                                        echo "<tr>";
                                        echo "<td>".$row['document_type']." </td>";
                                        echo "<td>".$row['document_category']." </td>";
                                        echo "<td>".$row['document_type']." </td>";
                                        echo "<td> <span class='badge badge-success'>Uploaded</span></td>";
                                        echo "<td><a href='documents/$row[file]' target='_blank'><i class='fas fa-eye fa-sm'></i></a>&nbsp&nbsp";
                                        echo "<a href='student-delete-document.php?file=".$row['file']."'><i class='fas fa-trash-alt fa-sm'></i></a>&nbsp&nbsp";
                                        echo "<a href='documents/$row[file]' download><i class='fas fa-download fa-sm'></i></a>&nbsp&nbsp";
                                        echo "<a href='#'><i class='fas fa-ellipsis-v fa-sm'></i></a>";
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