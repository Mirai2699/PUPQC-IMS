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

    $stmt2 = $dbh2->prepare("INSERT INTO ims_t_dept_summary_returns(Date_IssueRet, Account_ID, Depart_Name, Status) VALUES (?,?,?, 'PENDING')");
    $stmt2->bindParam(1, $getdate);
    $stmt2->bindParam(2, $acc);
    $stmt2->bindParam(3, $dept);

    $arr2 = $_POST;
    $getdate = $arr2['DRdate'];
    $acc = $arr2['DRaccount'];
    $dept = $arr2['DRdept'];
    $stmt2->execute();

    echo $getdate;
    echo $supplier;
    echo "<br>";

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

    $stmt = $dbh->prepare("INSERT INTO ims_t_dept_returns(Date_Proc, Item_Name, Item_Cat, Unit, Quantity, Purpose, Batch_No) 
                                VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bindParam(1, $date);
    $stmt->bindParam(2, $name);
    $stmt->bindParam(3, $cat);
    $stmt->bindParam(4, $unit);
    $stmt->bindParam(5, $quan);
    $stmt->bindParam(6, $purpose);
    $stmt->bindParam(7, $batch);


    $arr = $_POST; 
    for($i = 0; $i <= count($arr['ret_procure'])-1;$i++)
    {
        $date = $arr['ret_procure'][$i];
        $name = $arr['ret_name'][$i]; 
        $cat = $arr['ret_category'][$i]; 
        $unit = $arr['ret_unit'][$i];
        $quan = $arr['ret_quan'][$i]; 
        $purpose = $arr['ret_purpose'][$i];
        $batch = $arr['DR_batch']; 
        $stmt->execute();

        
    }

     header('Location: DPForRet.php');

?>