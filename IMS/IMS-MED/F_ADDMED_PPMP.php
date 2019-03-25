<?php

     $db = mysqli_connect('localhost','root','','pupqc_ams_ims_db');
                
        $setdate = $_POST['currentdate'];

        $acqins = "INSERT INTO ims_t_ppmp_med_summary
                        (MED_PPMP_Date_Created, MED_PPMP_Date_Request)     
                   VALUES ('$setdate','$setdate')";
              
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

    $stmt = $dbh->prepare("INSERT INTO ims_t_ppmp_med_details
                                        (Med_Name, 
                                         Unit, 
                                    --   Quantity, 
                                         Est_Budget, 
                                         Jan, 
                                         Feb,
                                         March,
                                         April,
                                         May,
                                         June,
                                         July,
                                         Aug,
                                         Sept,
                                         Oct,
                                         Nov,
                                         Decem,
                                         Batch_No) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
                         ");

    $stmt->bindParam(1, $name);
    $stmt->bindParam(2, $unit);
    $stmt->bindParam(3, $budget);
    $stmt->bindParam(4, $Jan);
    $stmt->bindParam(5, $Feb);
    $stmt->bindParam(6, $March);
    $stmt->bindParam(7, $April);
    $stmt->bindParam(8, $May);
    $stmt->bindParam(9, $June);
    $stmt->bindParam(10, $July);
    $stmt->bindParam(11, $Aug);
    $stmt->bindParam(12, $Sept);
    $stmt->bindParam(13, $Oct);
    $stmt->bindParam(14, $Nov);
    $stmt->bindParam(15, $Dec);
    $stmt->bindParam(16, $ursid);


    $arr = $_POST; 
    for($i = 0; $i <= count($arr['r_name'])-1;$i++)
    {
        $name = $arr['r_name'][$i];
        $unit = $arr['r_unit'][$i];
    //  $qty = $arr['r_quantity'][$i];
        $budget = $arr['r_budget'][$i];
        $Jan = $arr['r_jan'][$i];
        $Feb = $arr['r_feb'][$i];
        $March = $arr['r_mar'][$i];
        $April = $arr['r_apr'][$i];
        $May = $arr['r_may'][$i];
        $June = $arr['r_jun'][$i];
        $July = $arr['r_jul'][$i];
        $Aug = $arr['r_aug'][$i]; 
        $Sept = $arr['r_sep'][$i];
        $Oct = $arr['r_oct'][$i];
        $Nov = $arr['r_nov'][$i]; 
        $Dec = $arr['r_dec'][$i];
        $ursid = $arr['r_batch'];  
        $stmt->execute();

    }

     
                echo "<script type=\"text/javascript\">".
                         "alert
                         ('You have successfully created a PMPP!  You will be redirected to a page to view your recently created plan');".
                          "</script>";
                echo "<script>setTimeout(\"location.href = 'MEDReviewMEDPPMP.php?viewrequests=$ursid'\",0);</script>"; 

?>


