<?php


	$db = mysqli_connect('localhost','root','','pupqc_ams_ims_db');



	if(isset($_POST['Addacc']))
	{

	 	$Username = $_POST['accuser'];
		$Pass = $_POST['accpass'];
		$AccType = $_POST['acctype'];
		$EmpID = $_POST['accempID'];
		$office = $_POST['accoffice'];

		$addquery = "INSERT INTO pso_r_user (U_USERNAME,
										     U_PASSWORD,
										     U_TYPE,
										     EP_ID,
										     O_ID
										     ) 

				   					  VALUES('$Username',
				   					  		 '$Pass',
				   					  		 '$AccType',	
				   					  		 '$EmpID',
				   					  		 '$office'
				   					  		  )";

		mysqli_query($db,$addquery);
		header('location: SAmngeacc.php');
	}


	else if(isset($_POST['Updateacc']))
	{   
		$ID = $_POST['accID'];
	 	$Username = $_POST['accuser'];
		$Pass = $_POST['accpass'];
		$AccType = $_POST['acctype'];
	//	$office = $_POST['accoffice'];
		$activation = $_POST['accstat'];

		
		$uquery = mysqli_query($db,"UPDATE pso_r_user SET U_USERNAME = '$Username',
														  U_PASSWORD = '$Pass',
														  U_TYPE =  '$AccType',
														  U_STATUS = '$activation'

														WHERE U_ID = '$ID'");
		header('location: SAmngeacc.php');

	}

?>