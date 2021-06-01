<!-- Content Row -->
<!--HEADER SUMMARY FOR AN ACCOUNTANT-->
<div class="row">

    <!-- Total Students -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Ctr No Created</div>
                        <?php
                        $sql = "SELECT * FROM student_bill";
                        $query = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($query);
                        ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count;  ?></div>
                    </div>
                    <div class="col-auto">

                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Registered Students -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Paid Control Numbers</div>
                        <?php
                        $sql = "SELECT * FROM student_bill where status='paid'";
                        $query = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($query);
                        ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count;  ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-check fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Frozen Studies -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pending Payments
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <?php
                                $sql = "SELECT * FROM student_bill where status='pending'";
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

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Exp Control Numbers</div>
                        <?php
                        $sql = "SELECT * FROM student_bill where status='expired'";
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
     