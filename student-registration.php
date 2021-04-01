<?php
session_start();
$role = $_SESSION['sess_userrole'];
if(!isset($_SESSION['sess_email']) || $role != "admin"){
    if(!isset($_SESSION['sess_email']) || $role != "admission"){
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
                <?php include 'top-bar.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Student Registration</h1>
                    <form class="user" method="post" action="student-registration-upload.php">
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="f_name">First Name</label>
                                <input type="text" class="form-control" id="FirstName"
                                    placeholder="Eve" required="true">
                            </div>
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="m_name">Middle Name</label>
                                <input type="text" class="form-control" id="MiddleName"
                                    placeholder="Ibrahim">
                            </div>
                            <div class="col-sm-4">
                                <label for="l_name">Last Name</label>
                                <input type="text" class="form-control" id="LastName"
                                    placeholder="Wilomo" required="true">
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="gender">Gender</label>
                                <select class = "selectpicker form-control" id = "sex" name="sex">
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                                <!-- <input type="sex" class="form-control form-control-user"
                                    id="sex" placeholder="Sex" required="true"> -->
                            </div>
                            <div class="col-sm-4">
                                <label for="marital-status">Marital Status</label>
                                <select class = "selectpicker form-control" id = "marriage" name="marriage">
                                    <option>Single</option>
                                    <option>Married</option>
                                    <option>Devorced</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label for="dob">Date of Birth</label>
                                <input type="date" class="form-control"
                                    id="date" placeholder="15/03/1880" required="true">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="reg-no">Registration Number</label>
                                <input type="text" class="form-control" id="RedNumber"
                                    placeholder="M078/T19" required="true">
                            </div>
                            <div class="col-sm-4">
                                <label for="phone">Phone Number</label>
                                <input type="text" class="form-control" id="phone"
                                    placeholder="+255765268371" required="true">
                            </div>
                            <div class="col-sm-4">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" id="InputEmail"
                                placeholder="wilomoe@nm-aist.ac.tz" required="true">
                            </div>
                            
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="address">Address</label>
                                <input type="address" class="form-control"
                                    id="address" placeholder="P.O.Box 12, Ilemela - Mwanza" required="true">
                            </div>
                            <div class="col-sm-4">
                                <label for="country">Nationality</label>
                                <select name="nationality" type ="country" class="form-control selectpicker">
                                    <option value="">Nationality</option>
                                    <option>Afghan</option>
                                    <option>Albanian</option>
                                    <option>Algerian</option>
                                    <option>American</option>
                                    <option>Andorran</option>
                                    <option>Angolan</option>
                                    <option>Antiguans</option>
                                    <option>Argentinian</option>
                                    <option>Armenian</option>
                                    <option>Australian</option>
                                    <option>Austrian</option>
                                    <option>Azerbaijani</option>
                                    <option>Bahamian</option>
                                    <option>Bahraini</option>
                                    <option>Bangladeshi</option>
                                    <option>Barbadian</option>
                                    <option>Barbudans</option>
                                    <option>Botswana</option>
                                    <option>Belarussian</option>
                                    <option>Belgian</option>
                                    <option>Belizean</option>
                                    <option>Beninese</option>
                                    <option>Bhutanese</option>
                                    <option>Bolivian</option>
                                    <option>Bosnian</option>
                                    <option>Brazilian</option>
                                    <option>British</option>
                                    <option>Bruneian</option>
                                    <option>Bulgarian</option>
                                    <option>Burkinabe</option>
                                    <option>Burmese</option>
                                    <option>Burundian</option>
                                    <option>Cambodian</option>
                                    <option>Cameroonian</option>
                                    <option>Canadian</option>
                                    <option>Cape Verdean</option>
                                    <option>Central African</option>
                                    <option>Chadian</option>
                                    <option>Chilean</option>
                                    <option>Chinese</option>
                                    <option>Colombian</option>
                                    <option>Comoran</option>
                                    <option>Congolese</option>
                                    <option>Costa Rican</option>
                                    <option>Croatian</option>
                                    <option>Cuban</option>
                                    <option>Cypriot</option>
                                    <option>Czech</option>
                                    <option>Danish</option>
                                    <option>Djibouti</option>
                                    <option>Dominican</option>
                                    <option>Dutch</option>
                                    <option>East Timorese</option>
                                    <option>Ecuadorean</option>
                                    <option>Egyptian</option>
                                    <option>Emirati</option>
                                    <option>Equatorial Guinean</option>
                                    <option>Eritrean</option>
                                    <option>Estonian</option>
                                    <option>Ethiopian</option>
                                    <option>Fijian</option>
                                    <option>Filipino</option>
                                    <option>Finnish</option>
                                    <option>French</option>
                                    <option>Gabonese</option>
                                    <option>Gambian</option>
                                    <option>Georgian</option>
                                    <option>German</option>
                                    <option>Ghanaian</option>
                                    <option>Greek</option>
                                    <option>Grenadian</option>
                                    <option>Guatemalan</option>
                                    <option>Guinea-Bissauan</option>
                                    <option>Guinean</option>
                                    <option>Guyanese</option>
                                    <option>Haitian</option>
                                    <option>Honduran</option>
                                    <option>Hungarian</option>
                                    <option>Icelander</option>
                                    <option>Indian</option>
                                    <option>Indonesian</option>
                                    <option>Iranian</option>
                                    <option>Iraqi</option>
                                    <option>Irish</option>
                                    <option>Israeli</option>
                                    <option>Italian</option>
                                    <option>Ivorian</option>
                                    <option>Jamaican</option>
                                    <option>Japanese</option>
                                    <option>Jordanian</option>
                                    <option>Kazakhstani</option>
                                    <option>Kenyan</option>
                                    <option>Kiribati</option>
                                    <option>Kittian and Nevisian</option>
                                    <option>Kuwaiti</option>
                                    <option>Kyrgyz</option>
                                    <option>Laotian</option>
                                    <option>Latvian</option>
                                    <option>Lebanese</option>
                                    <option>Liberian</option>
                                    <option>Libyan</option>
                                    <option>Liechtensteiner</option>
                                    <option>Lithuanian</option>
                                    <option>Luxembourger</option>
                                    <option>Macedonian</option>
                                    <option>Malagasy</option>
                                    <option>Malawian</option>
                                    <option>Malaysian</option>
                                    <option>Maldivan</option>
                                    <option>Malian</option>
                                    <option>Maltese</option>
                                    <option>Marshallese</option>
                                    <option>Mauritanian</option>
                                    <option>Mauritian</option>
                                    <option>Mexican</option>
                                    <option>Micronesian</option>
                                    <option>Moldovan</option>
                                    <option>Monacan</option>
                                    <option>Mongolian</option>
                                    <option>Moroccan</option>
                                    <option>Mosotho</option>
                                    <option>Motswana</option>
                                    <option>Mozambican</option>
                                    <option>Namibian</option>
                                    <option>Nauruan</option>
                                    <option>Nepalese</option>
                                    <option>New Zealander</option>
                                    <option>Nicaraguan</option>
                                    <option>Nigerian</option>
                                    <option>North Korean</option>
                                    <option>Norwegian</option>
                                    <option>Omani</option>
                                    <option>Pakistani</option>
                                    <option>Palauan</option>
                                    <option>Panamanian</option>
                                    <option>Papua New Guinean</option>
                                    <option>Paraguayan</option>
                                    <option>Peruvian</option>
                                    <option>Polish</option>
                                    <option>Portuguese</option>
                                    <option>Qatari</option>
                                    <option>Romanian</option>
                                    <option>Russian</option>
                                    <option>Rwandan</option>
                                    <option>St. Lucian</option>
                                    <option>Salvadoran</option>
                                    <option>Samoan</option>
                                    <option>San Marinese</option>
                                    <option>Sao Tomean</option>
                                    <option>Saudi</option>
                                    <option>Senegalese</option>
                                    <option>Serbian</option>
                                    <option>Seychellois</option>
                                    <option>Sierra Leonean</option>
                                    <option>Singaporean</option>
                                    <option>Slovakian</option>
                                    <option>Slovenian</option>
                                    <option>Solomon Islander</option>
                                    <option>Somali</option>
                                    <option>South African</option>
                                    <option>South Korean</option>
                                    <option>Spanish</option>
                                    <option>Sri Lankan</option>
                                    <option>Sudanese</option>
                                    <option>Surinamer</option>
                                    <option>Swazi</option>
                                    <option>Swedish</option>
                                    <option>Swiss</option>
                                    <option>Syrian</option>
                                    <option>Taiwanese</option>
                                    <option>Tajik</option>
                                    <option>Tanzanian</option>
                                    <option>Thai</option>
                                    <option>Togolese</option>
                                    <option>Tongan</option>
                                    <option>Trinidadian</option>
                                    <option>Tunisian</option>
                                    <option>Turkish</option>
                                    <option>Tuvaluan</option>
                                    <option>Ugandan</option>
                                    <option>Ukrainian</option>
                                    <option>Uruguayan</option>
                                    <option>Uzbekistani</option>
                                    <option>Venezuelan</option>
                                    <option>Vietnamese</option>
                                    <option>West Indian</option>
                                    <option>Yemenite</option>
                                    <option>Zambian</option>
                                    <option>Zimbabwean</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label for="course">Course</label>
                                <select class = "selectpicker form-control" id = "course" name="corse">
                                    <!-- FETCH LIST FROM THE DB -->
                                    <option>WiMC</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="cohort">Cohort</label>
                                <input type="number" class="form-control"
                                    id="cohort" placeholder="1 - 11" required="true">
                            </div>
                            <div class="col-sm-4">
                                <label for="sponsor">Sponsorship</label>
                                <select class = "selectpicker form-control" id = "sponsor" name="sponsor">
                                    <!-- FETCH LIST FROM THE DB -->
                                    <option>Private</option>
                                    <option>Project</option>
                                    <option>Devorced</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label for="study-type">Study Type</label>
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
                                <a type="submit" href="login.html" class="btn btn-primary btn-block">
                                Register Student
                                </a> 
                            </div>
                        
                        </div>
                    </form>
                            <hr>
                            <h3>OR</h3>
                            <p>Upload Bulk Students</p>
                            <form method="post" action="import-bulk.php" enctype="multipart/form-data">
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