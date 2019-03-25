<?php


	$db = mysqli_connect('localhost','root','','pupqc_ams_ims_db');


    

	if(isset($_POST['AddAL']))
	{

		$ALName = $_POST['AL_Name'];

		$query = "INSERT INTO ams_r_asset_library (AL_NAME) VALUES('$ALName')";

		mysqli_query($db,$query);

		header('location: SAAssetlib.php');
	}

	if(isset($_POST['UpdateAL']))
	{
		$ALID = $_POST['AL_ID'];
		$ALName = $_POST['AL_Name'];

		$uquery = mysqli_query($db,"UPDATE ams_r_asset_library SET AL_NAME = '$ALName' WHERE AL_ID = '$ALID'");
		header('location: SAAssetlib.php');
	}


?>