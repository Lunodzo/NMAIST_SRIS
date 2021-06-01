<?php
session_start();
$role = $_SESSION['sess_userrole'];
if(!isset($_SESSION['sess_email']) || $role != "admin"){
    if(!isset($_SESSION['sess_email']) || $role != "admission"){
        if(!isset($_SESSION['sess_email']) || $role != "welfare"){
            header('Location: index.php?err=2');
        }
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

    <title>SRIS - Metrics</title>

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

        <?php
        if($role == "admission"){
            require 'navigation-admissions.php';
        }else if($role == "welfare"){
            require 'navigation-welfare.php';
        }
        else{
            require 'navigation.php';
        }
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php require 'top-bar.php' ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Admissions Metrics</h1>
                    <p class="mb-4">All admissions details in summary since the establishment of the NM_AIST <a
                            target="_blank" href="admissions.php">Get back to Admission Dashboard</a>.</p>

                    <!-- Another Row -->
                    <div class="row">

                        <div class="col-xl-8 col-lg-7">

                            <!-- Area Chart -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Admissions Overview</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>

                            <!-- Bar Chart -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Student Distribution in Schools</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-bar">
                                        <canvas id="myBarChart"></canvas>
                                    </div>
                                    <hr>
                                    Number of students in each School since first enrollment
                                </div>
                            </div>

                        </div>

                        <!-- Donut Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Students Nationalities</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <hr>
                                    Students distribution based on their Nationalities
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

    <!-- BAR CHART -->
<!--    <script>-->
<!--        var ctx = document.getElementById('myBarCharNum');-->
<!--        var myChart = new Chart(ctx, {-->
<!--            type: 'bar',-->
<!--            data: {-->
<!--                labels: ['CoCSE', 'LiSBE', 'MEWES', 'BuSH'],-->
<!--                datasets: [{-->
<!--                    label: '# of Students',-->
<!--                    data: [210, 140,98,0],-->
<!--                    backgroundColor: "#4e73df",-->
<!--                    hoverBackgroundColor: "#2e59d9",-->
<!--                    borderColor: "#4e73df"-->
<!--                }],-->
<!--            },-->
<!--            options:{-->
<!--                maintainAspectRatio: false,-->
<!--                layout: {-->
<!--                  padding: {-->
<!--                    left: 10,-->
<!--                    right: 25,-->
<!--                    top: 25,-->
<!--                    bottom: 0-->
<!--                  }-->
<!--                },-->
<!---->
<!--                scales:{-->
<!--                    xAxes: [{-->
<!--                        time: {-->
<!--                          unit: 'month'-->
<!--                        },-->
<!--                        gridLines: {-->
<!--                          display: false,-->
<!--                          drawBorder: false-->
<!--                        },-->
<!--                        ticks: {-->
<!--                          maxTicksLimit: 6-->
<!--                        },-->
<!--                        maxBarThickness: 25,-->
<!--                    }],-->
<!--                    yAxes: [{-->
<!--                        ticks: {-->
<!--                          min: 0,-->
<!--                          max: 15000,-->
<!--                          maxTicksLimit: 5,-->
<!--                          padding: 10,-->
<!--                          // Include a dollar sign in the ticks-->
<!--                          callback: function(value, index, values) {-->
<!--                            return ' ' + number_format(value);-->
<!--                          }-->
<!--                        },-->
<!--                        gridLines: {-->
<!--                          color: "rgb(234, 236, 244)",-->
<!--                          zeroLineColor: "rgb(234, 236, 244)",-->
<!--                          drawBorder: false,-->
<!--                          borderDash: [2],-->
<!--                          zeroLineBorderDash: [2]-->
<!--                        }-->
<!--                    }],-->
<!--                },-->
<!--                legend:{-->
<!--                    display: false-->
<!--                },-->
<!--                tooltips: {-->
<!--                    titleMarginBottom: 10,-->
<!--                  titleFontColor: '#6e707e',-->
<!--                  titleFontSize: 14,-->
<!--                  backgroundColor: "rgb(255,255,255)",-->
<!--                  bodyFontColor: "#858796",-->
<!--                  borderColor: '#dddfeb',-->
<!--                  borderWidth: 1,-->
<!--                  xPadding: 15,-->
<!--                  yPadding: 15,-->
<!--                  displayColors: false,-->
<!--                  caretPadding: 10,-->
<!--                  callbacks: {-->
<!--                    label: function(tooltipItem, chart) {-->
<!--                      var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';-->
<!--                      return datasetLabel + ' ' + number_format(tooltipItem.yLabel);-->
<!--                    }-->
<!--                  }-->
<!--                },-->
<!--            }-->
<!--        });-->
<!--    </script>-->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="js/demo/chart-bar-demo.js"></script>

</body>

</html>