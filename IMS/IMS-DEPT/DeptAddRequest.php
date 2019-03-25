<?php

     $db = mysqli_connect('localhost','root','','pupqc_ams_ims_db');
                
       $batch = $_POST['r_batch'];
       $Drequest = $_POST['currentdate'];
       $accid = $_POST['r_account'];
       $reqdept = $_POST['reqdept'];
                

              

        $acqins = "INSERT INTO ims_t_dept_summary_request
                        (Batch_No, Date_Requested, Account_Name, Depart_Name)     
                   VALUES ('$batch','$Drequest', '$accid', '$reqdept')";
              
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

    $stmt = $dbh->prepare("INSERT INTO ims_t_dept_requisition(Item_SKU,DR_Quantity,Batch_No) VALUES (?, ?, ?)");
    $stmt->bindParam(1, $sku);
    $stmt->bindParam(2, $qty);
    $stmt->bindParam(3, $ursid);


    $arr = $_POST; 
    for($i = 0; $i <= count($arr['r_sku'])-1;$i++)
    {   
        $sku = $arr['r_sku'][$i];
        $qty = $arr['r_quantity'][$i]; 
        $ursid = $arr['r_batch'];  
        $stmt->execute();

       
    }
    echo $sku;
    header('Location: DPPenReq.php');

?>



