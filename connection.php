<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "nmaist_sris";

$conn = mysqli_connect($servername,$username,$password,$dbName);

// Check connection
if (!$conn) {
  die("Could not connect to Database ".mysqli_connect_error());
}
