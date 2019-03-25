<?php


	$db = mysqli_connect('localhost','root','','pupqc_ams_ims_db');


    

	if(isset($_POST['Addcampus']))
	{

		$CCode = $_POST['C_Code'];
		$CName = $_POST['C_Name'];

		$query = "INSERT INTO pso_r_campus (C_CODE,C_NAME) VALUES('$CCode','$CName')";

		mysqli_query($db,$query);

		header('location: SAcampus.php');
	}

	if(isset($_POST['Updatecampus']))
	{
		$CID = $_POST['C_ID'];
		$CName = $_POST['C_Name'];

		$uquery = mysqli_query($db,"UPDATE pso_r_campus SET C_NAME = '$CName' WHERE C_ID = '$CID'");
		header('location: SAcampus.php');
	}


?>