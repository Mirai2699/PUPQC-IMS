<?php


	$db = mysqli_connect('localhost','root','','pupqc_ams_ims_db');


    

	if(isset($_POST['AddDL']))
	{
		$DLCode = $_POST['DL_Code'];
		$DLName = $_POST['DL_Name'];

		$query = "INSERT INTO ams_r_disposal_location (DL_CODE,DL_DESC) VALUES('$DLCode','$DLName')";

		mysqli_query($db,$query);

		header('location: SADisloc.php');
	}

	if(isset($_POST['UpdateDL']))
	{
		$DLID = $_POST['DL_ID'];
		//$DLCode = $_POST['DL_CODE'];
		$DLName = $_POST['DL_Name'];

		$uquery = mysqli_query($db,"UPDATE ams_r_disposal_location SET  DL_DESC = '$DLName' WHERE DL_ID = '$DLID'");
		header('location: SADisloc.php');
	}


?>