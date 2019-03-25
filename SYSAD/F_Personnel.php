<?php


	$db = mysqli_connect('localhost','root','','pupqc_ams_ims_db');



	//$sql = "SELECT MAX(Employee_No) as Num FROM ims_r_employee";
		//$g = mysqli_fetch_array(mysqli_query($db,$sql));

		//$No = ++$g['Num'];
		$ID = $_POST['EMP_ID'];
		$Fname = $_POST['EMP_Fname'];
		$Mname = $_POST['EMP_Mname'];
		$Lname = $_POST['EMP_Lname'];
		$Gender = $_POST['EMP_Gender'];
		$Cnum = $_POST['EMP_Contact'];
		$Eadd = $_POST['EMP_EmAdd'];
		$Bday = $_POST['EMP_Bday'];
		$Hadd = $_POST['EMP_HomeAdd'];
		$jobt = $_POST['EMP_Jt'];
		$jobd = $_POST['EMP_Jd'];
	    $IDpic = $_POST['EMP_IDpic'];
		$Office = $_POST['EMP_Office'];
		$Stats = $_POST['EMP_Stat'];


	if(isset($_POST['Addperson']))
	{


		$addquery = "INSERT INTO pso_r_employee_profile (EP_FNAME,
													  EP_MNAME,
													  EP_LNAME,
													  EP_GENDER,
													  EP_MOBILE,
													  EP_EMAIL,
													  EP_BIRTHDATE,
													  EP_HOME_ADDRESS,
													  EP_TYPE,
													  EP_TYPE_DESC,
													  EP_PICTURE,
													  O_ID) 
											   VALUES('$Fname',
											   		  '$Mname', 
											   		  '$Lname', 
											   		  '$Gender',
											   		  '$Cnum',
											   		  '$Eadd',
											   		  '$Bday',
											   		  '$Hadd',
											   		  '$jobt',
											   		  '$jobd',
											   		  '$IDpic',
											   		  '$Office')";

		mysqli_query($db,$addquery);
		header('location: SAaddacc.php');
	}


	else if(isset($_POST['Updateperson']))
	{   
		
		$updatequery = "UPDATE pso_r_employee_profile SET  EP_FNAME = '$Fname',
														   EP_MNAME = '$Mname',
														   EP_LNAME = '$Lname',
													       EP_MOBILE = '$Cnum',
													       EP_EMAIL = '$Eadd',
													       EP_BIRTHDATE = '$Bday',
													       EP_HOME_ADDRESS = '$Hadd',
													       EP_TYPE = '$jobt',
													       EP_TYPE_DESC = '$jobd',
													       EP_PICTURE = '$IDpic',
													       O_ID = '$Office',
													       EP_STATUS = '$Stats'
										WHERE EP_ID = '$ID'";
		mysqli_query($db,$updatequery);
		header('location: SAmngeperson.php');

	}

?>