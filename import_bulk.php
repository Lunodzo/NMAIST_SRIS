<?php
require 'connection.php';
if(isset($_POST["submit_file"])){

 	$file = $_FILES["file"]["tmp_name"];
 	$file_open = fopen($file,"r");
	while(($csv = fgetcsv($file_open, 1000, ",")) !== false){
		$first_name = $csv[0];
	  	$middle_name = $csv[1];
	  	$country = $csv[2];
	  	mysql_query("INSERT INTO employee VALUES ('$first_name','$middle_name','country')");
	 }
	}
?>