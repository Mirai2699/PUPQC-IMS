	<?php


	$db = mysqli_connect('localhost','root','','pupqc_ams_ims_db');

	if(isset($_POST['Adddept']))
	{

		//$sql = "SELECT MAX(Depart_No) as Num FROM ims_r_department";
		//$g = mysqli_fetch_array(mysqli_query($db,$sql));

		//$No = ++$g['Num'];
		$OCode = $_POST['OCode'];
		$OName = $_POST['OName'];
		$ODesc = $_POST['ODesc'];
		$OHead = $_POST['OHead'];
		$OCampus = $_POST['OCampus'];


		$query = "INSERT INTO pso_r_office (O_CODE,O_NAME,O_DESCRIPTION,EP_ID,C_ID) VALUES('$OCode', '$OName', '$ODesc', '$OHead','$OCampus')";

		mysqli_query($db,$query);

		header('location: SAmngedept.php');
	}

	else if(isset($_POST['Updatedept']))
	{
		$No = $_POST['OID'];
		$name = $_POST['OName'];
		$desc = $_POST['ODesc'];
		$employee = $_POST['OHead'];
		$campus = $_POST['OCampus'];

	    $query = mysqli_query($db,"UPDATE pso_r_office
									SET    O_NAME = '$name',
										   O_DESCRIPTION = '$desc', 
										   EP_ID = $employee,
										   C_ID = $campus, 
									WHERE  O_ID = '$No'");
		
		echo $No;
		echo $name;
		echo $desc;
		echo $employee;
		echo $campus;

		header('location: SAmngedept.php');

	}

?>
