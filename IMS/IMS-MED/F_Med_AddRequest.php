<?php

     $db = mysqli_connect('localhost','root','','pupqc_ams_ims_db');
                
       $batch = $_POST['r_batch'];
       $Drequest = $_POST['currentdate'];
       $UID = $_POST['r_uid'];
       $accid = $_POST['r_account'];
       $reqdept = $_POST['reqdept'];
                




        $acqins = "INSERT INTO ims_t_med_summary_request
                        (Batch_No, Date_Requested, Account_ID, Account_Name, Depart_Name)     
                   VALUES ('$batch','$Drequest', '$UID', '$accid', '$reqdept')";
              
        mysqli_query($db,$acqins);



?>


<?php  

    $user = 'root';
    $pass = '';
    $dbnm = 'pupqc_ams_ims_db';

    try 
    {
        $dbh = new PDO('mysql:host=localhost;dbname='.$dbnm, $user, $pass);
    } 
    catch (PDOException $e) 
    {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();  
    }

    $stmt = $dbh->prepare("INSERT INTO ims_t_med_requisition(Item_Name, Item_Category, MED_Unit, MED_Quantity, Status, Batch_No) VALUES (?, ?, ?, ?, 'PENDING', ?)");
    $stmt->bindParam(1, $name);
    $stmt->bindParam(2, $categ);
    $stmt->bindParam(3, $unit);
    $stmt->bindParam(4, $qty);
    $stmt->bindParam(5, $ursid);


    $arr = $_POST; 
    for($i = 0; $i <= count($arr['r_name'])-1;$i++)
    {
        $name = $arr['r_name'][$i];
        $categ = $arr['r_category'][$i];
        $unit = $arr['r_unit'][$i];
        $qty = $arr['r_quantity'][$i]; 
        $ursid = $arr['r_batch'];  
        $stmt->execute();

    }

     header('Location: MEDPenReq.php');

?>


