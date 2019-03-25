

<?php

   include("db.php");
   $Batch = $_POST['Iss_Batch'];

    $query = mysqli_query($connection,"UPDATE ims_t_dept_summary_request SET Date_Released = CURRENT_TIMESTAMP, Status_Req = 'RELEASE',  Remarks = '$rmrks'
                                  WHERE Batch_No = '$Batch' ");

?>


<?php

    $user2 = 'root';
    $pass2 = '';
    $dbnm2 = 'pupqc_ams_ims_db';

    try 
    {
        $dbh2 = new PDO('mysql:host=localhost;dbname='.$dbnm2, $user2, $pass2);
    } 
    catch (PDOException $e) 
    {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }

    $stmt2 = $dbh2->prepare("INSERT INTO ims_t_summary_issuance(Batch_No, Date_Requested, Date_Revised, Date_Approved, Date_Released, Remarks,Account_ID, Depart_Name) 
                            VALUES (?,?,?,?,?,?,?,?)");
    $stmt2->bindParam(1, $batch);
    $stmt2->bindParam(2, $ReqDate);
    $stmt2->bindParam(3, $RevDate);
    $stmt2->bindParam(4, $AprDate);
    $stmt2->bindParam(5, $Reldate);
    $stmt2->bindParam(6, $rmrks);
    $stmt2->bindParam(7, $accid);
    $stmt2->bindParam(8, $reqdept);

    $arr2 = $_POST;
    $batch = $arr2['Iss_Batch'];
    $ReqDate = $arr2['IssReq'];
    $RevDate = $arr2['IssRev'];
    $AprDate = $arr2['IssApr'];
    $Reldate = $arr2['Iss_currentdate'];
    $rmrks = $arr2['Iss_Rem'];
    $accid = $arr2['Iss_accountid'];
    $reqdept = $arr2['Iss_reqdept'];
    $stmt2->execute();



     echo $batch;
     echo $ReqDate;
     echo $RevDate;
     echo $AprDate;
     echo $Reldate;
     echo $rmrks;
     echo $accid;
     echo $reqdept;

    $dbh2 = null;

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

    $stmt = $dbh->prepare("INSERT INTO ims_t_issuance(SKU, Item_Name, Unit, Quantity, Batch_No) VALUES (?, ?, ?, ?, ?)");
    $stmt->bindParam(1, $sku);
    $stmt->bindParam(2, $name);
    $stmt->bindParam(3, $unit);
    $stmt->bindParam(4, $qty);
    $stmt->bindParam(5, $ursid);


    $arr = $_POST; 
    for($i = 0; $i <= count($arr['SKU'])-1;$i++)
    {   
        $sku = $arr['SKU'][$i];
        $name = $arr['Iss_name'][$i];
        $unit = $arr['Iss_unit'][$i];
        $qty = $arr['Iss_quantity'][$i]; 
        $ursid = $arr['Iss_Batch'];
        $stmt->execute();

        
    }

    echo $name;
    echo $unit;
    echo $qty;
    echo $ursid;

    header('Location: PCIssRels.php');

?>