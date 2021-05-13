<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admi-dashboard.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-school"></i>
                   <!-- <i><img class="img-profile rounded-circle"
                                    src="img/mandela_logo.png"></i> -->
                    
                </div>
                <div class="sidebar-brand-text mx-3"> NM-AIST SRIS<sup>0.1</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="admi-dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->

            <!-- ADMISSIONS -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-university"></i>
                    <span>Admissions</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Registration:</h6>
                        <a class="collapse-item" href="admissions.php">Home</a>
                        <a class="collapse-item" href="admissions-metrics.php">Admissions Metrics</a>
                        <a class="collapse-item" href="student-registration.php">Register Students</a>
                        <a class="collapse-item" href="verify-docs.php">Verify Documents</a>

                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Students' Catalogue:</h6>
                        <a class="collapse-item" href="student-list.php">Students Listing</a>
                        <a class="collapse-item" href="upload-bulk-student.php">Upload Bulk Students</a>
                    </div>
                </div>
            </li>


            <!-- ACCOUNTS -->
            <li class="nav-item">
                <a class="nav-link" href="accounts.php">
                    <i class="fas fa-fw fa-money-check-alt"></i>
                    <span>Accounts</span></a>
            </li>


             <!-- WELFARE -->

             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-people-carry"></i>
                    <span>Welfare</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Accommodations:</h6>
                        <a class="collapse-item" href="#">Allocate Rooms</a>
                        <a class="collapse-item" href="hostel-status.php">Check Hostel status</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Health Insurance</h6>
                        <a class="collapse-item" href="#">Registered</a>
                        <a class="collapse-item" href="#">Pending</a>

                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Special Needs</h6>
                        <a class="collapse-item" href="404.php">Check List</a>
                        <a class="collapse-item" href="404.php">International Students</a>

                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Counselling</h6>
                        <a class="collapse-item" href="404.php">Requests</a>
                        <a class="collapse-item" href="404.php">Serviced</a>
                    </div>
                </div>
            </li>
            

            <!-- BILLING -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-file-invoice-dollar"></i>
                    <span>Billing</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="#">Bills</a>
                        <a class="collapse-item" href="#">Payments</a>
                    </div>
                </div>
            </li>


            <!-- IT DEPARTMENT -->

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-laptop-medical"></i>
                    <span>IT Department</span></a>
            </li>


            <!-- SITE ADMINISTRATION -->
            <li class="nav-item">
                <a class="nav-link" href="system-administration.php">
                    <i class="fas fa-spinner fa-gear"></i>
                    <span>System Administration</span></a>
            </li>

            

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>