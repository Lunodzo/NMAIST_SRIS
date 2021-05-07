<!-- Content Row -->
<!--HEADER SUMMARY FOR STUDENT-->
<div class="row">

    <!-- Pending Payments -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Pending Payments</div>
<!--                        Count Bills-->
                        <?php
                        $sql = "SELECT * FROM student_bill_view where email = '$email'";
                        $query = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($query);
                        ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count;  ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-money-bill-alt fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Documents -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Pending Documents</div>
<!--                        Count document that are not uploaded-->
                        <?php
                        $student = "SELECT student_id from student where email ='$email'";
                        $run = mysqli_query($conn, $student);
                        $student_i = mysqli_fetch_assoc($run);
                        $student_id = $student_i['student_id'];
                        $sql = "SELECT DISTINCT * FROM unsubmitted_docs_view WHERE student_id='$student_id'";
                        $query = mysqli_query($conn, $sql);
                        $count_two = mysqli_num_rows($query);
                        ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count_two;  ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-file fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Helpdesk -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">HelpDesk Requests
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <?php
                                $sql = "SELECT * FROM student_service where email = '$email'";
                                $query = mysqli_query($conn, $sql);
                                $count = mysqli_num_rows($query);
                                ?>
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $count;  ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Deans Appointment -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Dean's Appointment</div>
                        <?php
                        $sql = "SELECT * FROM dean_appointment where email = '$email' AND status = 'approved'";
                        $query = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($query);
                        ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count;  ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-clock fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

